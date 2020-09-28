<?php

namespace App\Http\Controllers;

use App\Models\Seatlimit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeatlimitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seatlimits = DB::table('seatlimits')->paginate();
        return view('seatlimit.index',['seatlimits'=>$seatlimits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seatlimit.create');
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
            'limit' => 'required',
        ]);

        $created = Seatlimit::create([
           'limit' => $request->limit,
        ]);

        if ($created){
            return redirect()->route('seatlimits.index')->with('status','Seat Limit added  successfully');
        }

        return redirect()->back()->with('status', 'Whoops! someting went wrong!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seatlimit  $seatlimit
     * @return \Illuminate\Http\Response
     */
    public function show(Seatlimit $seatlimit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seatlimit  $seatlimit
     * @return \Illuminate\Http\Response
     */
    public function edit(Seatlimit $seatlimit)
    {
        $seatlimits = Seatlimit::findOrFail($seatlimit->id);
        return view('seatlimit.edit',compact('seatlimits'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seatlimit  $seatlimit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seatlimit $seatlimit)
    {
        $this->validate($request,[
            'limit' => 'required',
        ]);

        $seatlimit = Seatlimit::find($seatlimit->id);
        $seatlimit->limit = $request->limit;
        

        if ($seatlimit->save()){
            return redirect()->back()->with('status','Seat Limit updated');
        }

        return redirect()->back()->with('status','Whoops field!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seatlimit  $seatlimit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seatlimit $seatlimit)
    {
        $deleted = $seatlimit->delete();

        if ($deleted){
            return redirect()->back()->with('status','Deleted successfully');
        }
        return redirect()->back()->with('status','Whoops! Delete Fail!');
    }
}
