<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Department;
use App\Classes;

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
        $student = Student::count();
        $departments = Department::withCount('student')->get();
        //$classes = Classes::withCount('student')->get();

        return view('home', compact('student','departments'));
    }
}
