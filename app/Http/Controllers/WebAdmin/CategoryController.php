<?php

namespace App\Http\Controllers\WebAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('dashboard.category.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.category.create');
    }

    public function store(CategoryRequest $request)
    {
        $path = 'categories/';
        $generateSrc = Storage::put('/' . trim($path, '/'), $request->thumbnail, 'public');
        $extension = pathinfo($generateSrc, PATHINFO_EXTENSION);
        $mimeType = $request->thumbnail->getMimeType();
        $type = explode('/', $mimeType)[0];

        $media = Media::create([
            'src' => $generateSrc,
            'path' => $path,
            'extension' => $extension,
            'type' => $type,
        ]);

        Category::create([
            'media_id' => $media->id,
            'title' => $request->title,
            'slug' => $request->slug,
            'status' => $request->status ? true : false,
        ]);

        return to_route('admin.categories.index')->with('success', 'Category created successfully.');
    }
}
