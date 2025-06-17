<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    protected $guarded = ['id'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
    public function thumbnail()
    {
        return $this->belongsTo(Media::class, 'thumbnail_id');
    }

    public function thumbnailPath(): Attribute
    {
        $thumbnail = 'https://placehold.co/512x512';

        if ($this->thumbnail && Storage::exists($this->thumbnail->src)) {
            $thumbnail = Storage::url($this->thumbnail->src);
        }

        return Attribute::make(
            get: fn() => $thumbnail,
        );
    }
    public function document()
    {
        return $this->belongsTo(Media::class, 'document_id');
    }

    public function documentPath(): Attribute
    {
        $document = 'https://placehold.co/512x512';

        if ($this->document && Storage::exists($this->document->src)) {
            $document = Storage::url($this->document->src);
        }

        return Attribute::make(
            get: fn() => $document,
        );
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
