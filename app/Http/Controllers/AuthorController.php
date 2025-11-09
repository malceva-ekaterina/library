<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('items.authors.index', compact('authors'));
    }

    public function create()
    {
        return view('items.authors.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'lastname'=>'required|string',
            'firstname'=>'required|string',
            'patronymic'=>'string|nullable',
        ]);

        Author::create([
            'lastname'=> $request->lastname,
            'firstname' => $request->firstname,
            'patronymic' => $request->patronymic
        ]);

        return redirect()
        ->route('items.authors.index')
        -> with('Message', 'Author created susseccly');
    }

}
