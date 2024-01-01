<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("tasksList", [
            "tasks" => Task::latest()->simplePaginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $data = $request->validated();
        // $task->title = $data['title'];
        // $task->description = $data['description'];
        // $task->save();
        $task = Task::create($data);

        return redirect()->route("tasks.show", ["task" => $task->id])->with("success", "Task created successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view("taskInfo")->with("task", $task);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('editTask')->with("task", $task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        //
        $data = $request->validated();

        $task->update($data);
        // $task->title = $data['title'];
        // $task->description = $data['description'];
        // $task->save();

        return redirect()->route("tasks.show", ["task" => $task])->with("success", "Task Updated successfully!");
    }
    public function edit_completed(Task $task)
    {
        $task->toggle();
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.showAll')->with("success", "Task Deleted successfully!");
    }
}
