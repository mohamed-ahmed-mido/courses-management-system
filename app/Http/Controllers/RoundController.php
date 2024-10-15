<?php

namespace App\Http\Controllers;

use App\Models\Round;
use Illuminate\Http\Request;

class RoundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rounds = Round::all();

        return view('rounds.index',compact('rounds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rounds.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'round_number' => 'required|min:2|string'
        ]);
         $round= new Round;
         $round->round_number = $request->round_number;
         $round->save();
        return redirect()->back()->with('success','add round successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Round $round)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Round $round)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Round $round)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Round $round)
    {
        //
    }
}
