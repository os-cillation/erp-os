<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $projects = Project::withTrashed()->get();
        $projects = Project::all();

        return response()->json($projects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'min:3', 'max:255'],
            'description' => ['sometimes', 'min:3']
        ]);

        $currentUser = Auth::guard('api')->user();

        $users = DB::table('users')->get()->whereIn('id', array_merge((array) $request->request->get('users'), (array) $currentUser->id));

        $project = new Project($request->request->all());
        $project->save();

        $project->users()->attach($users->pluck('id')->toArray());

        return response()->json($currentUser);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return response()->json($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Project $project
     * @return \Illuminate\Http\Response
     * @throws ValidationException
     */
    public function update(Request $request, Project $project)
    {
        $this->validate($request, [
            'name' => ['required', 'min:3', 'max:255'],
            'description' => ['sometimes', 'min:3']
        ]);

        $project->update($request->all());
        return response()->json($project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Project $project
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return response()->json('ok');
        //
    }
}
