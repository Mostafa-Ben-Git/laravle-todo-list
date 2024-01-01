<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::get('/tasks', [TaskController::class, "index"])->name("tasks.showAll");

Route::view("/tasks/add", "addNewTask")->name("tasks.add");

Route::get("/tasks/{task}", [TaskController::class, "show"])->name("tasks.show");

Route::get("/tasks/{task}/edit", [TaskController::class, "edit"])->name("tasks.edit");

Route::post("/tasks", [TaskController::class, "store"])->name("tasks.store");

Route::put("/tasks/{task}", [TaskController::class, "update"])->name("tasks.update");

Route::delete("tasks/{task}", [TaskController::class, "destroy"])->name("tasks.destroy");

Route::put("tasks/{task}/toggle", [TaskController::class, "edit_completed"])->name("tasks.toggle-completed");
