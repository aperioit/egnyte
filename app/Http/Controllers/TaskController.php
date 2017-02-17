<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\TaskList;
use App\Http\Requests;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('title', 'asc')->get();
        // User::find(1)->phone;

        return view('task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tasklists = TaskList::all();

        return view('task.create', compact('tasklists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'task_list_id' => 'required|exists:task_lists,id'
        ]);

        $task = Task::create($request->all());

        flash()->success("$task->name has been created!");

        return redirect('task');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);

        return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = task::findOrFail($id);
        $tasklists = TaskList::all();

        foreach ($tasklists as $tasklist)
        {
            $tasklistsArray[$tasklist->id] = $tasklist->name;
        }

        return view('task.edit', compact('task', 'tasklistsArray'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'task_list_id' => 'required|exists:task_lists,id'
        ]);

        $task = Task::find($id);
        $task->name = $request->input('name');
        $task->task_list_id = $request->input('task_list_id');
        $task->save();

        flash()->success("$task->name has been updated!");

        return redirect('task');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}