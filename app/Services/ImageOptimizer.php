<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use RuntimeException;

/**
 * Optimizes uploaded images using GD.
 *
 * Resizes images larger than the configured max dimension and
 * re-encodes them to the target format with quality compression.
 */
class ImageOptimizer
{
    /**
     * The maximum width/height an image can be after optimization.
     */
    protected int $maxDimension = 1600;

    /**
     * JPEG quality (0-100).
     */
    protected int $quality = 82;

    /**
     * Store an optimized image and return the storage path.
     */
    public function store(UploadedFile $file, string $directory, string $disk = 'public'): string
    {
        $image = $this->make($file);

        if ($image === null) {
            // Not an image GD can process — store as-is
            return $file->store($directory, $disk);
        }

        [$width, $height] = $this->getDimensions($image);

        // Resize down if larger than max dimension
        if ($width > $this->maxDimension || $height > $this->maxDimension) {
            $ratio = min($this->maxDimension / $width, $this->maxDimension / $height);
            $newWidth = (int) round($width * $ratio);
            $newHeight = (int) round($height * $ratio);
            $resized = imagescale($image, $newWidth, $newHeight);

            if ($resized !== false) {
                imagedestroy($image);
                $image = $resized;
            }
        }

        $extension = $file->getClientOriginalExtension();
        $optimizedExtension = in_array(strtolower($extension), ['jpg', 'jpeg']) ? 'jpg' : 'png';
        $filename = uniqid('img_', true) . '.' . $optimizedExtension;
        $path = rtrim($directory, '/') . '/' . $filename;

        $this->encode($image, $optimizedExtension);

        // Write to storage
        $fullPath = Storage::disk($disk)->path($path);
        $this->saveToPath($image, $optimizedExtension, $fullPath);

        imagedestroy($image);

        return $path;
    }

    /**
     * Create a GD image resource from an uploaded file.
     */
    protected function make(UploadedFile $file): ?\GdImage
    {
        $mime = $file->getMimeType();

        return match ($mime) {
            'image/jpeg' => @imagecreatefromjpeg($file->getRealPath()),
            'image/png' => @imagecreatefrompng($file->getRealPath()),
            'image/gif' => @imagecreatefromgif($file->getRealPath()),
            'image/webp' => @imagecreatefromwebp($file->getRealPath()),
            default => null,
        };
    }

    /**
     * Get image dimensions.
     *
     * @return array{0: int, 1: int}
     */
    protected function getDimensions(\GdImage $image): array
    {
        return [imagesx($image), imagesy($image)];
    }

    /**
     * Set the encoding options for the image resource.
     */
    protected function encode(\GdImage $image, string $extension): void
    {
        // Preserve PNG alpha channel
        if ($extension === 'png') {
            imagealphablending($image, false);
            imagesavealpha($image, true);
        }
    }

    /**
     * Save the GD image resource to a filesystem path.
     */
    protected function saveToPath(\GdImage $image, string $extension, string $path): void
    {
        $directory = dirname($path);

        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $saved = match ($extension) {
            'png' => imagepng($image, $path, 6),
            'gif' => imagegif($image, $path),
            'webp' => imagewebp($image, $path, $this->quality),
            default => imagejpeg($image, $path, $this->quality),
        };

        if (! $saved) {
            throw new RuntimeException("Failed to write optimized image to: {$path}");
        }
    }
}
