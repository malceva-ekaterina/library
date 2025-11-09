<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        return view('readers.groups.index', compact('groups'));
    }

    public function create()
    {
        return view('readers.groups.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
        ]);

        Group::create([
            'name'=> $request->name,
        ]);

        return redirect()
        ->route('readers.groups.index')
        ->with('Message', 'Author created susseccly');
    }
}
