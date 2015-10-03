<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
//use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use App\Project;

class ProjectCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $projects = Project::all();

      return view('Project/project', ['projects' => $projects]);//
    }

    public function createProjectForm()
    {
      return view('Project/createProject');
    }

    public function viewDetail($projectID)
    {
      $detProject = Project::findOrFail($projectID);

      return view('Project/projectDetail', compact('detProject'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createProject(Request $request)
    {
      $image = $request->file('mainImage');
      $filename = time() . '-' . $image->getClientOriginalName();
      $path = public_path('image/' . $filename);
      $destPath = public_path('image/');
      $request->file('mainImage')->move($destPath, $filename);

      $project = new Project;
      $project->title = $request->title;
      $project->mainImage = $filename;
      $project->category = $request->category;
      $project->description = $request->description;
      $project->goal = $request->goal;
      $project->duration = $request->duration;
      $project->save();

      return redirect('projects'); //
    }

    public function viewEditDetail($projectID)
    {
      $detProject = Project::findOrFail($projectID);

      return view('Project/editProject', compact('detProject'));
    }

    public function updateProject(Request $request)
    {
      $id = $request->input('id');
      $detProject = Project::findOrFail($id);

      $image = $request->file('mainImage');
      $filename = time() . '-' . $image->getClientOriginalName();
      $path = public_path('image/' . $filename);
      $destPath = public_path('image/');
      $request->file('mainImage')->move($destPath, $filename);

      $detProject->mainImage = $filename;
      $detProject->category = $request->input('category');
      $detProject->description = $request->input('description');
      //$project->goal = $request->goal;
      //$project->duration = $request->duration;
      $detProject->save();

      return redirect('project/'.$id);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
