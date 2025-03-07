<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
       return Task::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',  // Validate that the 'name' is required, a string, and not too long
        ]);
    
        // If validation passes, proceed to create the task
        $task = Task::create($validated);
        return response()->json($task, 201);  // Return the created task in JSON format
    }

}
