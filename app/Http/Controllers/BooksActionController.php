<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Books_Action;
use App\Models\Reader;
use Illuminate\Http\Request;

class BooksActionController extends Controller
{
    public function index()
    {
        $books_actions = Books_Action::all();
        return view('accounting.index', compact('books_actions'));
    }
    public function issuance(Request $request)
    {

        $readers = Reader::where('can_get_books', 1);
        $books = Book::where('count_of_items', '>', 1);

        $search_readers = $request->input('search_reader');
        $search_book = $request->input('search_book');

        if ($search_readers or $search_book) {
            $readers = $readers->where('lastname', 'LIKE', '%' . $search_readers . '%');

            $books = $books->where('fullname', 'LIKE', '%' . $search_book . '%' );
        }


        return view('accounting.issuance', compact('readers', 'books'));
    }

    public function get_book(Request $request)
    {
        $request->validate([
            'reader_id'=>'required|exists:readers,id',
            'book_id'=>'required|exists:books,id',
            'get_date'=>'required|date',
            'count'=>'required|integer|min:1'
        ]);

        $book = Book::find($request->book_id);

        if ($book->count_of_items < $request->count) {
            return redirect()
            ->back()
            ->withErrors('Count of items to big');
        }

        $book->count_of_items -= $request->count;
        $book->save();

        Books_Action::create($request->all());

        return redirect()
        ->route('accounting.index');
    }
}
