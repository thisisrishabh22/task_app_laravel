<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = auth()->user()->tasks()->orderBy('created_at', 'desc')->get();

        return view('tasks.index')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        //
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'start_time' => 'required',
            'end_time' => 'required',
            'date' => 'required',
        ]);

        Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'date' => $request->date,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //

        return view('tasks.show')->with('task', $task);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //

        return view('tasks.edit')->with('task', $task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
        $task->delete();

        redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
