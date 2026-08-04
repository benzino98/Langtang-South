<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    protected $table = 'document_categories';

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
