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
        
        if ((Auth::user()->email == Auth::user()->student->email))  {
            //$students = Student::all();
            
            

            
        }
        //$users = DB::select('students')
        //$student = Student::count();
        //$departments = Department::withCount('student')->get();
        //$classes = Classes::withCount('student')->get();



        return view('home');
    }
}
