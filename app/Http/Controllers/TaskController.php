<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Task;

class TaskController extends Controller
{
  public function index(){
    $tasks = Task::all();
    return view('task.index', compact('tasks'));
    
  }
  public function store(){
     $data = request()->validate([
        'title' => 'string',
        'content' =>'string'
     ]);
     Task::create($data);
     return redirect()->route('tasks.index');
  }
  public function delete(Task $task){
    $task->delete();
    return redirect()->route('tasks.index');
  }
  public function edit(Task $task){
      return view('task.edit', compact('task'));
  }
  public function update(Task $task){
    $data = request()->validate([
      'title'=> 'string',
      'content'=>'string'
    ]);
    $task->update($data);
    return redirect()->route('tasks.index');
  }
 
}
