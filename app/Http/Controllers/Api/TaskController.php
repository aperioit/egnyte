<?php

namespace App\Http\Controllers\Api;

use App\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Task::orderby('name', 'asc')->get();
    }

    /**
     * Update the order of all tasks.
     *
     * @param Request $request
     * @return void
     */
    public function updateOrder(Request $request)
    {
        foreach ($request->tasks as $task) {
            Task::find($task['id'])->update(['order' => $task['order']]);
        }

        return response()->json(null, 204);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  Tasklist $tasklist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json(null, 204);
    }
}
