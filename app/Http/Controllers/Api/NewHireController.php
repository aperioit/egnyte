<?php

namespace App\Http\Controllers\Api;

use App\NewHire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewHireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return NewHire::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  $param
     * @return \Illuminate\Http\Response
     */
    public function show($param)
    {
        return NewHire::where('id', $param)
            ->orWhere('slug', $param)
            ->firstOrFail();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return NewHire::destroy($id);
    }

    /**
     * Update the notes of the newhire.
     *
     * @param Request $request
     * @return void
     */
    public function updateNotes(Request $request)
    {
        NewHire::find($request->id)->update(['notes' => $request['notes']]);

        return response()->json(null, 204);
    }    
}
