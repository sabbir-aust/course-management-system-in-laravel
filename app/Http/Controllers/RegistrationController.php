<?php

namespace App\Http\Controllers;

use App\Models;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Classes;
use App\Models\Faculty;
use App\Models\Course;
use App\Student;
use App\Models\Sessions;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$id = Auth::Student()->id;

        $reg_start = Sessions::all()->pluck('reg_start_date')->first();
        $reg_end = Sessions::all()->pluck('reg_end_date')->first();
        //$current_date = \Carbon\Carbon::now()->format('d/m/y');

        $start_date = \Carbon\Carbon::parse($reg_start);
        $end_date = \Carbon\Carbon::parse($reg_end);

        $check = \Carbon\Carbon::now()->between($start_date,$end_date);

        
       

        //dd($check);
        if ($check == True) {
            
        
        if(Auth::user()){

            if(Auth::user()->role == "student"){

                $courses = Student::where("user_id", Auth::user()->id)->first();
                $courses = Course::select('id','course_code','course_name','category_id','classes_id','faculty_id','class_start_time','class_end_time','seatlimit')->paginate(4);
                return view('registration.index',compact('courses'));
           
            }
        }
    } 
    else{

        return view('registration.status')->with('status','Registration Not Started !');
    }

              
    }

    public function studentdetails(){
        //$registrations = Registration::all();
        $all = Registration::all();
        return view('registration.studentdetails',compact('all'));


    }

    public function search(Request $req){

        $all = Registration::whereHas('student',function($query) use($req){
            $query->where('name','like','%' .$req->search. '%');
        })->get();

        // $search = $request->get('search');
        // $all = DB::table('registrations')->where('student_id','like','%' .$search. '%')->paginate();
        return view('registration.studentdetails',compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  

        if(Auth::user()){

                $id = Student::where("user_id", Auth::user()->id)->first();
               
        }

        //$courses = Course::all()->pluck('seatlimit')->first();
        $input = $request->all();

        // $input['registration'] = $request->input('registration');
        $answers = $request->input('registration');
        $isExists = Registration::select("*")
                        ->where('student_id',$id->id)
                        ->where("course_id", $answers)
                        ->exists();

            
        
        $totalsub = DB::table('registrations')->where('student_id',$id->id)->count('course_id');
        
        if($totalsub < 3){       

            if(!$isExists){
                    

                // foreach ($answers as $answer) {
            // for ($i=0; $i < count($answers) ; $i++) { 
                        
                    $courses = Course::where('id',$answers)->pluck('seatlimit')->first();
                    

                        if ($courses > 0) {
                            $insert = DB::insert('INSERT INTO registrations (student_id, course_id) VALUES (?, ?)', array($id->id,$answers)); 

                            if ($insert) {
                    
                                DB::table('courses')->where('id',$answers)->decrement('seatlimit',1);
                            } 
                        }

                        else{
                            return redirect()->back()->with('status','Limit Over !!');
                           
                        } 
                // }
            }

            else{
                return redirect()->back()->with('status','Already Selected !!');
            }
        }
        else{
            return redirect()->back()->with('status','Cannot Take More Than 3 Courses !!');
        }                    

            return redirect()->route('registrations.index')->with('status','Course Submitted  successfully');

        
      
    }


    public function takencourse(){

        $courses= Registration::select('student_id');
        

        if(Auth::user()){

            //$id = Auth::user('id');
            $id = Student::select('id')->where("user_id", Auth::user()->id)->first();
           
            // $taken = Registration::where('student_id',auth()->user()->id)->get();
           $taken=Registration::select('course_id')->where('student_id',$id->id)->get();
            
            return view('registration.takencourse',compact('taken'));
            
         }   
         


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function show(Registration $registration)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function edit(Registration $registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registration $registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registration $registration)
    {
        //
    }
}
