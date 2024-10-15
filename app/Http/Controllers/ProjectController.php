<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Reply;
use App\Models\Project;
use App\Models\Instructor;
use App\Http\Traits\media;
use App\Models\Course_round;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    use media;

    public function index()
    {

        if(Auth::user()->type== 'student'){
        $id =Auth::user()->course_round_id;
        $course_round= Course_round::with('project')->where('id',$id)->first();
        if($course_round){
        $projects= $course_round->project ;
        }else{
        $projects =[];
        }
    }else{
        $projects = Project::all();

    }
        return view('projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $course_rounds= Course_round::with('course','round')->get();

        return view('projects.create',compact('course_rounds'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = Auth::user()->id ;

        $user_id = User::with('instructor')->where('id',$id)->first();
        $instructor_id =$user_id->instructor->id;


        $size = 1024*4 ;
        $request->validate([
            'name' => 'required|string|min:3|max:30',
            'description' => 'required|string|max:60',
            'attachment' => "file|max:$size"
        ]);

        $project = new Project;
        $project->name = $request->name;
        $project->description = $request->description;
        $project->demo_link = $request->demo_link;
        $project->course_round_id = $request->course_round_id;
        $project->instructor_id = $instructor_id;

        if($request->has('attachment')){
            $file_name = $this->upload_files($request->file('attachment'),'projects') ;
            // $request_data= $request->file('attachment');
            // $file_name = time(). $request_data->getClientOriginalName();
            // $location = public_path('projects');
            // $request_data->move($location,$file_name);
            $project->attachment = $file_name ;
            }

            $project->save();
            return redirect()->back()->with('success','add project successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $replies = Reply::with('user')->where('project_id',$id)->get();
        $course_round_id= Project::with('course_round')->where('id',$id)->first()->course_round->id;
        $course_round= Course_round::with('course','round')->where('id',$course_round_id)->first();
        $project = Project::find($id);
        return view('projects.show',compact('project','replies','course_round'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $project = Project::find($id);

        return view('projects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $project = Project::find($id);
        $old_file= $project->attachment;
        if($request->file('attachment')== null){
            $project->attachment= $old_file;
        }else{
            $path= public_path('projects/'). $old_file;
            if(file_exists($path && $project->attachment!= null)){
                unlink($path);
            }
        $size = 1024*4 ;
        $request->validate([
            'name' => 'required|string|min:3|max:30',
            'attachment' => "file|max:$size"
        ]);
        $file_name= $this->upload_files($request->file('attachment'),'projects');
            $project->attachment = $file_name;
        }
        $project->name = $request->name;
        $project->demo_link = $request->demo_link;
        $project->save();
        return redirect()->back()->with('success','Update project successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $attachment= $project->attachment;
        $path= public_path('projects/') .$attachment;
        if(file_exists($path && $attachment!= null)){
        unlink($path);
        }
        $project->delete();
        return redirect()->route('projects.index')->with('success','Delete project successfully');
    }
    public function download($id){

            $project = Project::find($id);
            $attachment = $project->attachment;
            $path= public_path('projects/') . $attachment;
            if(file_exists($path) && $attachment!= null){
                return response()->download($path);
                }
            else{
                return  redirect()->back()->with('sorry','sorry, file not exists ');
            }
        }

}
