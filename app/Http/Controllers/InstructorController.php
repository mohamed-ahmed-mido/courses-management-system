<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructors = Instructor::with('user')->get();
        // return $instructors;
        return view('instructors.index',compact('instructors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('instructors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:30',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|max:30|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = 'instructor' ;
        $user->password = Hash::make($request->password);
        $user->save();

        $instructor= new Instructor;
        $instructor->user_id = $user->id;
        $instructor->parent= Auth::user()->name;
        $instructor->save();
        return redirect()->back()->with('success','instructor added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Instructor $instructor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instructor $instructor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instructor $instructor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($instructor_id)
    {
        $user_id = Instructor::with('user')->where('id',$instructor_id)->first()->user->id;
        User::where('id',$user_id)->delete();
        return redirect()->back()->with('success','instructor deleted successfully');
    }
}
