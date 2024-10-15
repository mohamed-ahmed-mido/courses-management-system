<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Round;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Course_round;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CourseRoundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructors = Instructor::with('user')->get();
        $course_rounds= Course_round::with('course','round','instructor','user')->get();
        // $course_rounds= Course_round::with('user')->where('id','1')->get();

        // $course_rounds= Course_round::with('course','round')->get();
        // return $course_rounds;
        return view('courseround.index',compact('course_rounds','instructors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rounds = Round::all();
        $courses= Course::all();

        $instructors= Instructor::with('user')->get();
        return view('courseround.create',compact('rounds','courses','instructors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $course_round = new Course_round;
        $course_round->course_id = $request->course_id;
        $course_round->round_id = $request->round_id;
        $course_round->instructor_id = $request->instructor_id;
        $course_round->save();
        return redirect()->back()->with('success','add course round successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course_round $course_round)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course_round $course_round)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course_round $course_round)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course_round $course_round)
    {
        //
    }
    public function viewstudents($id){
        $course_rounds= Course_round::with('user')->where('id',$id)->first();
        // return $course_rounds->user;
        return view('courseround.viewstudents',compact('course_rounds'));
    }
    public function addstudents($id){
        $course_round_id = $id;

        $course_rounds= Course_round::with('course','round')->where('id',$course_round_id)->first();
        // return  $course_round_id ;
        return view('courseround.addstudents',compact('course_round_id','course_rounds'));
    }
    public function storestudent(Request $request,$course_round_id){

        $request->validate([
            'name' => 'required|string|min:2|max:30',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|max:30|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->course_round_id = $course_round_id;
        $user->save();
        return redirect()->back()->with('success','user added successfully');

    }
}
