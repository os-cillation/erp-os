<?php

namespace App\Http\Controllers;

use App\Task;
use App\TimeTrackingEntry;
use App\User;
use Illuminate\Http\Request;

class TimeTrackingEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timeTrackingEntries = TimeTrackingEntry::all()
            ->whereBetween('created_at', [$this->timeLimitStart, $this->timeLimitEnd]);

        return response()->json($timeTrackingEntries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Task $task
     * @param User $user
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, User $user, Task $task)
    {
        $this->validate($request, [
            "text"          => ["required", "min:3", "max:255"],
            "amount"        => ["required", "date_format:H:i"],
        ]);

        $timeTrackingEntry = new TimeTrackingEntry([
            'text'      => $request->request->get('text'),
            'amount'    => $request->request->get('amount'),
        ]);

        $timeTrackingEntry->user = $user->id;
        $timeTrackingEntry->task = $task->id;

        $timeTrackingEntry->save();

        return response()->json($timeTrackingEntry);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TimeTrackingEntry  $timeTrackingEntry
     * @return \Illuminate\Http\Response
     */
    public function show(TimeTrackingEntry $timeTrackingEntry)
    {
        return response()->json($timeTrackingEntry);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\TimeTrackingEntry $timeTrackingEntry
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, TimeTrackingEntry $timeTrackingEntry)
    {
        $this->validate($request, [
            'text'      => ['sometimes', 'min:3', 'max:255'],
            "amount"    => ["sometimes", "date_format:H:i"],
        ]);

        $timeTrackingEntry->update($request->all());
        return response()->json($timeTrackingEntry);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\TimeTrackingEntry $timeTrackingEntry
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(TimeTrackingEntry $timeTrackingEntry)
    {
        $timeTrackingEntry->delete();

        return response()->json('ok');
    }
}
