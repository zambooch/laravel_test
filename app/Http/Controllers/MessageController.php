<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('message.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'text' => 'required|max:1000'
        ]);

        $request->user()->message()->create([

        ]);
        return redirect('/messages');
    }
}
