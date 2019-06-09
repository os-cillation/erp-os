<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all()
            ->whereBetween('created_at', [$this->timeLimitStart, $this->timeLimitEnd]);;

        return response()->json($tasks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Project $project
     * @param User $user
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, Project $project, User $user)
    {
        $this->validate($request, [
            "name"          => ["required", "min:3", "max:255"],
            "description"   => ["sometimes", "min:3", "max:255"],
        ]);

        $task = new Task([
            'name'          => $request->request->get('name'),
            'description'   => $request->request->get('description'),
        ]);

        $task->user = $user->id;
        $task->project = $project->id;

        $task->save();

        return response()->json($task);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return response()->json($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Task $task
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Task $task)
    {
        $this->validate($request, [
            'name'          => ['sometimes', 'min:3', 'max:255'],
            'description' => ['sometimes', 'min:3'],
        ]);

        $task->update($request->all());
        return response()->json($task);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Task $task
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json('ok');
    }
}
