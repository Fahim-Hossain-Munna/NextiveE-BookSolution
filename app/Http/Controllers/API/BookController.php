<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::get();
        return $this->json('Books fetched successfully.', BookResource::collection($books), 200);
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return $this->json('Book fetched successfully.', BookResource::make($book), 200);
    }
}
