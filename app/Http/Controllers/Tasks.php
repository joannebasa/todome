<?php

namespace App\Http\Controllers;
use App\Task;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

class Tasks extends Controller
{
    public function create(TaskRequest $request)
	{
    // handle post request
		$data = $request->only(["task", "completed"]);

		$task = Task::create($data);

		return response($task, 201);
	}

	public function list()
	{
		return Task::all();
	}

	public function update(TaskRequest $request, Task $task)
	{
		$data = $request->only(["task", "completed"]); 

		$task->fill($data)->save();
		return $task; 
	}

	public function delete(Task $task)
	{
		$task->delete(); 
		return response (null, 204);
	}

	public function complete(Task $task)
	{
		$task->completed = true; 
		$task->save(); 
		return response (null, 204); 
	}

	public function todo(Task $task)
	{
		$task->completed = false;
		$task->save();
		return response (null, 204);
	}
}
