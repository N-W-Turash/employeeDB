<?php

namespace App\Http\Controllers;

use App\Tasks;
use App\User;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Tasks::with(['assignee', 'assigner'])->get();

        return $tasks;
    }

    public function show($id)
    {

        $task = Tasks::find($id);

        return $task;
    }

    public function store()
    {

        $this->validate(request(), [

            'user_id' => 'required',

            'assigner_id' => 'required',

            'title' => 'required',

            'description' => 'required',

            'status' => 'required'

        ]);

        //dd('test');

        $task = Tasks::create([

            'user_id' => request('user_id'),

            'assigner_id' => request('assigner_id'),

            'title' => request('title'),

            'description' => request('description'),
        ]);

        return response()->json([

            'message' => 'Task created successfully',

            'task' => $task
        ]);
    }

    public function update($id)
    {

        $task = Task::find($id);

        $task->title = request('title');

        $task->descriptiomn = request('description');

        $task->save();

        //dd('test');

        return response()->json([

            'message' => 'Task updated successfully',

            'task' => $task
        ]);
    }

    public function destroy($id)
    {

        $task = Task::findOrFail($id);

        $task->delete();

        return response()->json([

            'message' => 'Task deleted successfully',
        ]);
    }

    public function usersTasks($id)
    {
        $user = User::with('assignedTasks')->find($id);


        return $user->assignedTasks;
    }

    public function assignersTasks($id)
    {

        $user = User::with('tasksAssigned')->find($id);

        return $user->tasksAssigned;
    }
}
