<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Reader;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    public function index() {
        $readers = Reader::all();
        return view('readers.readers.index', compact('readers'));
    }

    public function create()
    {
        $groups = Group::all();
        return view('readers.readers.create', compact('groups'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lastname'=>'required|string',
            'firstname'=>'required|string',
            'patronymic'=>'nullable|string',
            'type_of_reader'=>'required',
            'group_id'=>'nullable|required_if:type_of_readers,student|exists:groups,id',
        ]);

        Reader::create($request->all());

        return redirect()
        ->route('readers.readers.index');
    }
}
