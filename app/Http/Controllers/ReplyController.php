<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id= Auth::user()->id;
        $replies= Reply::with('project')->where('user_id',$user_id)->get();
        // return $replies;
        return view('reply.index',compact('replies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $project = Project::find($id);
        $project_id= $id;
        return view('reply.create',compact('project_id','project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request ,$id)
    {
        $project_id =$id;
        $user_id = Auth::user()->id ;



        $size = 1024*4 ;
        $request->validate([
            'name' => 'required|string|min:3|max:30',
            'attachment' => "file|max:$size"
        ]);

        $reply = new Reply;
        $reply->name = $request->name;
        $reply->demo_link = $request->demo_link;
        $reply->project_id = $project_id;
        $reply->user_id = $user_id;

        if($request->has('attachment')){
            $request_data= $request->file('attachment');

            $file_name = time(). $request_data->getClientOriginalName();
            $location = public_path('replys');
            $request_data->move($location,$file_name);
            $reply->attachment = $file_name ;
            }

            $reply->save();
            return redirect()->back()->with('success','add reply successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reply $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($reply_id)
    {
        $reply = Reply::with('project')->where('id',$reply_id)->first();

        return view('reply.edit',compact('reply'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $reply = Reply::find($id);
        $old_file= $reply->attachment;
        if($request->file('attachment')== null){
            $reply->attachment= $old_file;
        }else{
            $path= public_path('replys/'). $old_file;
            if(file_exists($path) && $reply->attachment != null){
                unlink($path);
            }

        $size = 1024*4 ;
        $request->validate([
            'name' => 'required|string|min:3|max:30',
            'attachment' => "file|max:$size"
        ]);
            $file_data= $request->file('attachment');
            $file_name = time(). $file_data->getClientOriginalName();
            $location = public_path('replys');
            $file_data->move($location,$file_name);
            $reply->attachment = $file_name;
        }
        $reply->name = $request->name;
        $reply->demo_link = $request->demo_link;
        $reply->save();
        return redirect()->back()->with('success','Update reply successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $reply = Reply::find($id);
        $attachment= $reply->attachment;
        $path= public_path('replys/') .$attachment;
        unlink($path);
        $reply->delete();
        return redirect()->back()->with('success','Delete reply successfully');
    }
    public function download($id){

        $reply = Reply::find($id);
        $attachment = $reply->attachment;
        $path= public_path('replys/') . $attachment;
        if(file_exists($path) && $attachment!= null){

            return response()->download($path);
            }
        else{
            return  redirect()->back()->with('sorry','sorry, file not exists ');
        }
    }
}
