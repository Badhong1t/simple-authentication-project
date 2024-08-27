<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class taskController extends Controller
{

    function index(Request $request){

        $user = $request->user();

        $tasks = $user->Task;

        return view('tasks.tasks', ['tasks' => $tasks]);

    }

    function store(Request $request){

        $currentUserId = $request->user()->id;
        $request->validate([

            'title' => 'required',
            'description' => 'required',
            'status' => 'required',

        ]);


        $task = new Task();

        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->user_id = $currentUserId;
        $task->save();

        return redirect()->route('tasks.index');

    }

    function destroy(Request $request, Task $task){

        $user = $request->user();
        if ($task->user_id == $user->id) {

            $task->delete();
            return redirect()->route('tasks.index');

        }
        else{

            abort(403, 'You are not authorized to delete task');

        }

    }

}
