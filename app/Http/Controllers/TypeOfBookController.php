<?php

namespace App\Http\Controllers;

use App\Models\Type_of_book;
use Illuminate\Http\Request;

class TypeOfBookController extends Controller
{
    public function index()
    {
        $types = Type_of_book::all();
        return view('items.types-of-books.index', compact('types'));
    }

    public function create()
    {
        return view('items.types-of-books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
        ]);

        Type_of_book::create([
            'name'=> $request->name,
        ]);

        return redirect()
        ->route('items.types-of-books.index')
        ->with('Message', 'Type created susseccly');
    }
}
