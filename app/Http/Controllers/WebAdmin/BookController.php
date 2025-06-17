<?php

namespace App\Http\Controllers\WebAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Category;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::get();

        return view('dashboard.book.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::get(['id', 'title']);
        return view('dashboard.book.create', compact('categories'));
    }

    public function store(BookRequest $request)
    {
        $documentId = null;
        $thumbnailId = null;
        $status = false;

        if (isset($request->status) && $request->status == 1) {
            $status = true;
        }

        if ($request->hasFile('thumbnail')) {
            $path = 'books/thumbnail/';
            $generateSrc = Storage::put('/' . trim($path, '/'), $request->thumbnail, 'public');
            $extension = pathinfo($generateSrc, PATHINFO_EXTENSION);
            $mimeType = $request->thumbnail->getMimeType();
            $type = explode('/', $mimeType)[0];

            $thumbnailMedia = Media::create([
                'src' => $generateSrc,
                'path' => $path,
                'extension' => $extension,
                'type' => $type,
            ]);
            $thumbnailId = $thumbnailMedia->id;
        }

        if ($request->hasFile('document')) {
            $path = 'books/document/';
            $generateSrc = Storage::put('/' . trim($path, '/'), $request->document, 'public');
            $extension = pathinfo($generateSrc, PATHINFO_EXTENSION);
            $mimeType = $request->document->getMimeType();
            $type = explode('/', $mimeType)[0];

            $documentMedia = Media::create([
                'src' => $generateSrc,
                'path' => $path,
                'extension' => $extension,
                'type' => $type,
            ]);
            $documentId = $documentMedia->id;
        }

        Book::create([
            'author_id' => Auth::id(),
            'thumbnail_id' => $thumbnailId,
            'document_id' => $documentId,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'short_description' => $request->short_description,
            'price' => $request->price,
            'status' => $status,
            'created_at' => now(),
        ]);

        return to_route('admin.books.index')->with('success', 'Book created successfully.');
    }

    public function delete(Book $book)
    {
        if ($book->thumbnail && Storage::exists($book->thumbnail->src)) {
            Storage::delete($book->thumbnail->src);
            $book->thumbnail->delete();
        }
        if ($book->document && Storage::exists($book->document->src)) {
            Storage::delete($book->document->src);
            $book->document->delete();
        }
        
        $book->delete();

        return to_route('admin.books.index')->with('success', 'Book deleted successfully.');
    }
}
