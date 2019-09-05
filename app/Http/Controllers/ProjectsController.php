<?php

namespace App\Http\Controllers;

use App\Project;
use App\Company;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    
        if(Auth::check()){ 
        $projects =Project::where('user_id',Auth::user()->id)->get();
        return view('projects.index',['projects' =>$projects]);
        }

        return view(auth.login);
       
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        //
        $companies=null;
        if(! $id)
        {
            $companies =Company::where('user_id',Auth::user()->id)->get();

        }

        return view('projects.create',['company_id'=>$id,'companies'=>$companies]);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(Auth::check())
        {

            $project = Project::create([
                'name' => $request->input('name'),
                'description'=> $request->input('description'),
                'user_id'=>Auth::user()->id,
                'company_id' =>$request->input('company_id')
            ]);

            if($project)
            {
                return redirect()->route('projects.show',['project'=>$project->id])->with('success','Project Created');

            }
            return back()->withInput()->with('error','error occured creating project');

        }
  }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //$project = Project::where('id',$project->id)->first();
        $project = Project::find($project->id);
        $comments =$project->comments;
        
        return view('projects.show',['project'=>$project,'comments' =>$comments]);
   
    }

    /**
     * Show the form for editing the specified resource.
     *
    
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
        
        $project = Project::find($project->id);
        
        return view('projects.edit',['project'=>$project]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    
        $projectupdate = Project::where('id',$project->id)
        ->update([
            'name' =>$request->input('name'),
            'description' =>$request->input('description')
        ]);

        if($projectupdate)
        {
            return redirect()->route('projects.show',['project' =>$project->id])->with('success',
            'Project updated successsfully');
        }
        return back()->withInput()->with('error','Project could not updated');

   
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
       // dd($project);
    
    $delProject = Project::find($project->id);

    if($delProject->delete())
    {
        return redirect()->route('projects.index')->with('success',
        'Project deleted successfully');
    }
    return back()->withInput()->with('error','could not delete project');

    }

    public function addUser()
    {
        
    }
}
