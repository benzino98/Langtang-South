<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\DocumentCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DocumentSeeder extends Seeder
{
    public function run(): void
    {
        $categories = DocumentCategory::all();

        if ($categories->isEmpty()) {
            return;
        }

        $sampleFilePath = 'documents/sample-document.pdf';
        if (!Storage::disk('public')->exists($sampleFilePath)) {
            return;
        }
        $fileSize = Storage::disk('public')->size($sampleFilePath);

        $documents = [
            [
                'title' => '2026 Approved Annual Budget',
                'description' => 'The approved budget for the 2026 fiscal year, detailing capital and recurrent expenditures.',
                'category_name' => 'Budgets',
                'file_type' => 'pdf',
                'file_path' => $sampleFilePath,
                'file_size' => $fileSize,
            ],
            [
                'title' => 'Community Hall Booking Form',
                'description' => 'Application form for booking the Langtang Town Hall for community events and private functions.',
                'category_name' => 'Forms',
                'file_type' => 'pdf',
                'file_path' => $sampleFilePath,
                'file_size' => $fileSize,
            ],
            [
                'title' => 'Official Gazette No. 12, Vol. 5',
                'description' => 'Official publication of new council bye-laws and public notices for the month of July 2026.',
                'category_name' => 'Gazettes',
                'file_type' => 'pdf',
                'file_path' => $sampleFilePath,
                'file_size' => $fileSize,
            ],
        ];

        foreach ($documents as $doc) {
            $category = $categories->where('name', $doc['category_name'])->first();
            if ($category) {
                Document::updateOrCreate(
                    ['title' => $doc['title']],
                    [
                        'document_category_id' => $category->id,
                        'description' => $doc['description'],
                        'file_path' => $doc['file_path'],
                        'file_type' => $doc['file_type'],
                        'file_size' => $doc['file_size'],
                        'is_published' => true,
                    ]
                );
            }
        }
    }
}
