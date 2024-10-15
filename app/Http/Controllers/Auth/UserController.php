<?php

namespace App\Http\Controllers\Auth;
use App\Models\Course_round;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('type','student')->get();
        // return $users;
        return view('users.index',compact('users'));
    }

    public function profile()
    {
        $id= Auth::user()->id;
        // $user = User::find($id);
        $user = User::where('id',$id)->first();
        return view('users.profile',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $course_rounds= Course_round::with('course','round')->get();
        return view('users.create',compact('course_rounds'));
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
        $user->password = Hash::make($request->password);
        $user->course_round_id = $request->course_round_id;
        $user->save();
        return redirect()->back()->with('success','user added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $course_rounds= Course_round::with('course','round')->get();
        return view('users.edit',compact('user','course_rounds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $request->validate([
            'name' => 'required|min:2|max:30|string',
            'email' => 'required|email|unique:users'
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->back()->with('success','update user successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id',$id)->delete();
        return redirect()->back()->with('success','delete student successfully');
    }
    public function change_password(Request $request){
        $id = Auth::user()->id;
        $user = User::find($id);
        $current_password = $user->password;
        // dd($request->all());
        $request->validate([
            'currentpassword' => 'required|current_password|string',
            'password' => 'required|confirmed|min:8|max:30|string'
        ]);
        if(Hash::check($request->currentpassword, $current_password) ){
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->with('success','change password successfully');
        }else{
            return redirect()->back()->with('sorry','change password failed');
        }

    }

    public function register(){
        $course_rounds= Course_round::with('course','round')->get();

        return view('auth.register',compact('course_rounds'));
    }
    public function change_course_round(Request $request ,$id){
        $user = User::find($id);
        $request->validate([
            'course_round_id' => 'required|exists:course_rounds,id',
        ]);
        $user->course_round_id = $request->course_round_id;
        $user->save();
        return redirect()->back()->with('success','update user course round successfully');
    }
}
