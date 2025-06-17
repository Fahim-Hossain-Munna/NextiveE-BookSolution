<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'author' => AuthorResource::make($this->author),
            'category' => CategoryResource::make($this->category),
            'thumbnail' => $this->thumbnailPath,
            'document' => $this->documentPath,
            'title' => $this->title,
            'slug' => $this->slug,
            'price' => (int) $this->price,
            'status' => $this->status,
            'description' => $this->short_description,
        ];
    }
}
