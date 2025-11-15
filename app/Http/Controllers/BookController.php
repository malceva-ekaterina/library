<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Publishing;
use App\Models\Type_of_book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return view('items.books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        $publishings = Publishing::all();
        $type_of_books = Type_of_book::all();

        return view('items.books.create', compact('authors', 'publishings', 'type_of_books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string',
            'type_of_book_id' => 'required|exists:type_of_books,id',
            'author_id' => 'required|exists:authors,id',
            'publishing_id' => 'required|exists:publishings,id',
            'year_of_publish' => 'required|integer|min:1900',
            'count_of_sheets' => 'required|integer|min:1',
            'count_of_items' => 'required|integer|min:1',
        ]);

        Book::create($request->all());

        return redirect()
            ->route('items.books.index');
    }
}
