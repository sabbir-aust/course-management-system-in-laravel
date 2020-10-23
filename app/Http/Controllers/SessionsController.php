<?php

namespace App\Http\Controllers;

use App\Models\Sessions;
use Illuminate\Http\Request;


class SessionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = Sessions::all();
        return view('session.index',compact('sessions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('session.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'session_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'reg_start_date' => 'required',
            'reg_end_date' => 'required',
            
        ]);

        $created = Sessions::create([
           'session_name' => $request->session_name,
           'start_date' => $request->start_date,
           'end_date' => $request->end_date,
           'reg_start_date' => $request->reg_start_date,
           'reg_end_date' => $request->reg_end_date,
           
        ]);

        if ($created){
            return redirect()->route('sessions.index')->with('status','Added  successfully');
        }

        return redirect()->back()->with('status', 'Whoops! someting went wrong!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sessions  $sessions
     * @return \Illuminate\Http\Response
     */
    public function show(Sessions $sessions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sessions  $sessions
     * @return \Illuminate\Http\Response
     */
    public function edit(Sessions $sessions)
    {
        $sessions = Sessions::findOrFail($sessions->id);
       
        return view('sessions.edit', compact('sessions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sessions  $sessions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sessions $sessions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sessions  $sessions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sessions $sessions)
    {
        $deleted = $sessions->delete();

        if ($deleted){
            return redirect()->back()->with('status','Deleted successfully');
        }
        return redirect()->back()->with('status','Whoops! Delete Fail!');
    
    }
}
