<?php

namespace App\Http\Controllers;

use App\Models\Publishing;
use Illuminate\Http\Request;

class PublishingController extends Controller
{
    public function index()
    {
        $publishings = Publishing::all();
        return view('items.publishings.index', compact('publishings'));
    }

    public function create()
    {
        return view('items.publishings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
        ]);

        Publishing::create([
            'name'=> $request->name,
        ]);

        return redirect()
        ->route('items.publishings.index')
        ->with('Message', 'publishing created susseccly');
    }
}
