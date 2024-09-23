<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Str;

class Tasks extends Controller
{
    //
    public function Create(Request $req){
        $req->validate([
            "title" => "required"
        ]);

        Task::create([
            'taskID' => Str::uuid(),
            'title' => $req->title,
            'userID' => session("userID")
        ]);

        return redirect("/dashboard");
    }

    public function update(Request $req)
    {
        $validated = $req->validate([
            'taskID' => 'required|uuid',
            'title' => 'required|string|max:255'
        ]);

        try {
            $task = Task::findOrFail($validated['taskID']);
            $task->title = $validated['title'];
            
            $task->save();

            return redirect("/dashboard");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update task title.');
        }
    }

    public function Delete(Request $req){
        Task::destroy($req->taskID);

        return redirect("/dashboard");
    }

}
