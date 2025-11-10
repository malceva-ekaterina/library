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
            'group_id'=>'nullable|required_if:type_of_reader,student|exists:groups,id',
        ]);

        $group_id = $request->group_id;

        if (($request->type_of_reader == 'teacher') or ($request->type_of_reader == 'other'))
        {
            $group_id = NULL;
        }

        Reader::create([
            'lastname'=>$request->lastname,
            'firstname'=>$request->firstname,
            'patronymic'=>$request->patronymic,
            'type_of_reader'=>$request->type_of_reader,
            'group_id'=>$group_id
        ]);

        return redirect()
        ->route('readers.readers.index');
    }
}
