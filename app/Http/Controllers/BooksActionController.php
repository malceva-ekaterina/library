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
            $readers = $readers->where('lastname', 'LIKE', '%'.$search_readers.'%');

            $books = $books->where('fullname', 'LIKE', '%'.$search_book.'%');
        }

        return view('accounting.issuance', compact('readers', 'books'));
    }

    public function getBooks(Request $request)
    {
        $request->validate([
            'reader_id' => 'required|exists:readers,id',
            'book_id' => 'required|exists:books,id',
            'get_date' => 'required|date',
            'count' => 'required|integer|min:1',
        ]);

        $book = Book::find($request->book_id);

        if ($request->count < 1) {
            return back()
                ->withErrors('Count of items to less 1');
        }

        if ($book->count_of_items < $request->count) {
            return redirect()
                ->back()
                ->withErrors('Count of items to big');
        }

        $book->count_of_items -= $request->count;
        $book->save();

        $books_action = Books_Action::create($request->all());

        $books_action->reader->can_get_books = false;
        $books_action->reader->save();

        return redirect()
            ->route('accounting.index');
    }

    public function return($id)
    {
        $books_action = Books_Action::find($id);

        return view('accounting.return', compact('books_action'));
    }

    public function returnBooks(Request $request, $id)
    {
        $request->validate([
            'return_date' => 'required|date',
            'count' => 'required|integer',
        ]);

        $books_action = Books_Action::findOrFail($id);
        if ($request->count > $books_action->count) {
            return back()
                ->withErrors('Count too big');
        }

        if ($request->count < $books_action->count) {
            $books_action->count -= $request->count;
            $books_action->book->count_of_items += $request->count;

            $books_action->save();
            $books_action->book->save();

            return redirect()
                ->route('accounting.index')
                ->with('Message', 'Return date not installed');
        }

        if ($request->count == $books_action->count) {
            $books_action->count = 0;
            $books_action->book->count_of_items += $request->count;

            $books_action->return_date = $request->return_date;
            $books_action->save();
            $books_action->book->save();

            $books_action->reader->can_get_books = true;
            $books_action->reader->save();

            return redirect()
                ->route('accounting.index');
        }
    }
}
