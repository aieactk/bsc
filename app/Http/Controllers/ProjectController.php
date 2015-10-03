<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
//use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $projects = Project::all()->where('statusProject', '!=', 'deleted');

      return view('Project/project', ['projects' => $projects]);//
    }

    public function createProjectForm()
    {
      if(Auth::check()){
        return view('Project/createProject');
      }
      else{
        return redirect('auth/login');
      }
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
      if(Auth::check())
      {
        $image = $request->file('mainImage');
        $filename = time() . '-' . $image->getClientOriginalName();
        $path = public_path('image/' . $filename);
        $destPath = public_path('image/');
        $request->file('mainImage')->move($destPath, $filename);

        $user = Auth::user();

        $project = new Project;
        $project->title = $request->title;
        $project->mainImage = $filename;
        $project->created_by = $user->_id;
        $project->category = $request->category;
        $project->description = $request->description;
        $project->goal = $request->goal;
        $project->duration = $request->duration;
        $project->save();

        return redirect('projects'); //
      }
      else{
        return redirect('auth/login');
      }
    }

    public function viewEditDetail($projectID)
    {
      if(Auth::check())
      {
        $detProject = Project::findOrFail($projectID);

        return view('Project/editProject', compact('detProject'));
      }
      else {
        return redirect('auth/login');
      }
    }

    public function updateProject(Request $request)
    {
      if(Auth::check()){
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
      else{
        return redirect('auth/login');
      }
    }

    public function deleteProject($id)
    {
      if(Auth::check()){
        $detProject = Project::findOrFail($id);
        $detProject->statusProject = 'deleted';
        $detProject->save();

        return redirect('projects');
      }
      else{
        return redirect('auth/login');
      }
    }
}
