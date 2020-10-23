<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Student;
use App\Department;
use App\Classes;
use App\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        
        //if ((Auth::user()->email == Auth::user()->student->email))  {
            //$students = Student::all();    
        //}
        //$users = DB::select('students')
        //$student = Student::count();
        //$departments = Department::withCount('student')->get();
        //$classes = Classes::withCount('student')->get();

        if(Auth::user()){

            if(Auth::user()->role == "student"){

                $student = Student::where("user_id", Auth::user()->id)->first();
                return view('home')->with('student',$student);          
            }

            if(Auth::user()->role == "admin"){

                $user = User::where("id", Auth::user()->id)->first();
                return view('home')->with('user',$user);

                //$students = Student::where("id", "=", Auth::user()->id)->get();
            }
        }

        
    }
}
