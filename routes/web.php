<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route("tasks.showAll");
});

Route::get('/tasks', function () {
    return view("tasksList", [
        "tasks" => Task::latest()->paginate(6)
    ]);
})->name("tasks.showAll");

Route::view("/tasks/add", "addNewTask");

Route::get("/tasks/{task}", function (Task $task) {
    return view("taskInfo")->with("task", $task);
})->name("tasks.show");

Route::get("/tasks/{task}/edit", function (Task $task) {
    return view('editTask')->with("task", $task);
})->name("tasks.edit");

Route::post("/tasks", function (TaskRequest $request) {
    $data = $request->validated();
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->save();
    $task = Task::ceate($data);

    return redirect()->route("tasks.show", ["task" => $task->id])->with("success", "Task created successfully!");
})->name("tasks.store");

Route::put("/tasks/{task}", function (Task $task, TaskRequest $request) {
    $data = $request->validated();

    $task->update($data);
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->save();

    return redirect()->route("tasks.show", ["task" => $task->id])->with("success", "Task Updated successfully!");
})->name("tasks.update");

Route::delete("tasks/{task}", function (Task $task) {
    $task->delete();

    return redirect()->route('tasks.showAll')->with("success", "Task Deleted successfully!");
})->name("tasks.destroy");
