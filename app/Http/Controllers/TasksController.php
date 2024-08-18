<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{

    public function index(Request $request)
    {
        $query = Task::when($request->status, function ($query, $status) {
            $query->where('status', $status);
        });

        // Order by logic
        $orderBy = $request->input('order_by', 'id'); // Default to 'id' if not specified
        $orderDirection = $request->input('order_direction', 'asc'); // Default to 'asc' if not specified

        switch ($orderBy) {
            case 'title':
                $query = $query->orderBy('title', $orderDirection);
                break;
            case 'id':
                $query = $query->orderBy('id', $orderDirection);
                break;
            case 'due_date':
                $query = $query->orderBy('due_date', $orderDirection);
                break;
        }


        $tasks = $query->paginate(10);
        $showToolbar = true;
        return view('tasks.index', [
            'tasks' => $tasks,
            'orderBy' => $orderBy,
            'orderDirection' => $orderDirection,
            'showToolbar' => $showToolbar,


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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tasks.index' , ['tasks' => [$task],'showToolbar' => false]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $task->update($request->only('status'));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
