<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// Str support module import
use Illuminate\Support\Str;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        return view('admin.projects.create', compact('project'));;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validation($request);
        // Perform an authorization check
        $formData = $request->all();
        //$formData['budget'] = '$' . number_format($formData['budget'], 2);


        $newProject = new Project();
        $newProject->fill($formData);
        $newProject->slug = Str::slug($formData['name']); // Assign the slug value based on the 'name' attribute

        // random variables temporarily assigned to manager_id and client_id
        $newProject->manager_id = rand(1, 20);
        $newProject->client_id = rand(1, 20);

        $newProject->save();

        return redirect()->route('admin.projects.show', $newProject->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin/projects/show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->validation($request);


        $formData = $request->all();
        $project->update($formData);
        $project->slug = Str::slug($formData['name']); // Assign the slug value based on the 'name' attribute

        $project->save();

        return redirect()->route('admin.projects.show', $project->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
    // custom method
    private function validation($request)
    {
        // dobbiamo prendere solo i parametri del form, utilizziamo quindi il metodo all()
        $formData = $request->all();


        $validator = Validator::make($formData, [

            'name' => 'required|max:50|min:6',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required|max:20',
            'budget' => 'required',

        ], [
            // dobbiamo inserire qui un insieme di messaggi da comunicare all'utente per ogni errore che vogliamo modificare
            'name.required' => 'The project name must be inserted',
            'name.max' => 'The project name must be longer than 50 characters',
            'name.mi' => 'The project name must be at least 6 characters',
            'description.required' => "The project description must be inserted",
            'start_date.required' => "The start date must be inserted",
            'end_date.required' => "The end date must be inserted",
            'sstatus.required' => "The status of the project must be inserted",
            'budget.required' => "The budget must be inserted",

        ])->validate();

        // we need to return a value because we are inside a function
        return $validator;
    }
}
