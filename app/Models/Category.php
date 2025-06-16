<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    protected $guarded = [''];

    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }

    public function mediaPath(): Attribute
    {
        $media = 'https://placehold.co/512x512';

        if ($this->media && Storage::exists($this->media->src)) {
            $media = Storage::url($this->media->src);
        }

        return Attribute::make(
            get: fn() => $media,
        );
    }
}
