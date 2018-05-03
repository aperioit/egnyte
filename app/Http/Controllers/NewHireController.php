<?php

namespace App\Http\Controllers;

use App\NewHire;
use App\Position;
use App\ActiveTask;
use Illuminate\Http\Request;
use App\Mail\NewHireAnnounced;
use Illuminate\Support\Facades\Mail;

class NewHireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newhires = NewHire::orderBy('hire_date', 'dsc')->paginate(5);
        $positions = Position::orderBy('name', 'asc')->get();

        return view('newhires.index', compact('newhires', 'positions'));
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
            'position_id' => 'required|exists:positions,id',
            'hire_date' => 'required|date',
            'notes' => 'nullable'
        ]);

        // Persist new hire to the database
        $newhire = NewHire::create([
            'name' => $request->input('name'),
            'position_id' => $request->input('position_id'),
            'hire_date' => $request->input('hire_date'),
            'notes' => $request->input('notes')
        ]);

        // Get position based on the persisted new hire data
        $position = Position::find($newhire->position_id);

        // Grab all tasks for each tasklist assigned to the position and
        // persist to the active_tasks table
        foreach ($position->tasklists as $tasklist) {
            foreach ($tasklist->tasks as $task) {
                ActiveTask::create([
                    "new_hire_id" => $newhire->id,
                    "task_list_id" => $task->task_list_id,
                    "task_id" => $task->id,
                    "task_name" => $task->name,
                    "task_details" => $task->details
                ]);
            }
        }

        // Send email to service desk
        Mail::to('support@aperio-it.com')->send(new NewHireAnnounced($newhire));

        flash()->success("$newhire->name has been announced!");

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  $param
     * @return \Illuminate\Http\Response
     */
    public function show($param)
    {
        // Get resource by id or slug
        $newhire = NewHire::where('id', $param)
            ->orWhere('slug', $param)
            ->firstOrFail();

        return view('newhires.show', compact('newhire'));
    }
}
