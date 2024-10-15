<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::with('user')->get();
        return view('admins.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.create');
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
        $user->type = 'admin' ;
        $user->password = Hash::make($request->password);
        $user->save();

        $admin= new Admin;
        $admin->user_id = $user->id;
        $admin->parent= Auth::user()->name;
        $admin->save();
        return redirect()->back()->with('success','admin added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($admin_id)
    {
        $user_id = Admin::with('user')->where('id',$admin_id)->first()->user->id;
        User::where('id',$user_id)->delete();
        return redirect()->back()->with('success','admin deleted successfully');
    }
}
