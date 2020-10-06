<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Department;
use App\Classes;
use App\User;
use Illuminate\Support\Facades\Auth;
//use Intervention\Image\Facades\Image;


class StudentController extends Controller
{
    public function index(){


    	$students = Student::all();
    	return view('student.index', compact('students'));

    }

    public function create(){

       $departments = Department::all();
       $users = User::all()->unique('email');
        //$classes = Classes::all();
    	return view('student.create',compact('departments','users'));
    	
    }

    public function save(Request $request){

         $this-> validate($request,[
            'name' => 'required',
            //'image' => 'required',

    	]);

        /*$stdImage='';
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $filename = time() .'.'. $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('/uploads/students/'.$filename));
            $stdImage = $filename;
           
        }*/

       

       

        Student::create([

            'name' => $request->name,
            'father_name' => $request->father_name,
            'phone_number' => $request->phone_number,
            'user_id' => $request->user_id,
            'roll' => $request->roll,
            'reg_id' => $request->reg_id,
            'department_id' => $request->department_id,
            
            //'classes_id' => $request->classes_id,
            'mother_name' => $request->mother_name,
            'cgpa' => $request->cgpa, 
            //'image' => $stdImage,

        ]);




    	//Classes::create([
    		//'title'=>$request->title
    	//]);
        


    	return redirect()->back()->with('status','Student Successfully Saved !');
    	
    }

    public function edit($id){

    	$students=Student::find($id);
        $departments= Department::all();
        $users = User::all();
        //$classes = Classes::all();
    	return view('student.edit',compact('students','departments','users'));
    	
    }

    public function update(Request $request, $id){


    	$this->validate($request, [
            'name' => 'required'

        ]);


        /*$stdImage='';
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $filename = time() .'.'. $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('/uploads/students/'.$filename));
            $stdImage = $filename;
            
        }*/

        $student= Student::findOrFail($id);
        $student->name = $request->name;
        $student->father_name = $request->father_name;
        $student->phone_number = $request->phone_number;
        $student->user_id= $request->user_id;
        $student->roll = $request->roll;
        $student->reg_id = $request->reg_id;
        $student->department_id= $request->department_id;
        //$student->classes_id = $request->classes_id;
        $student->mother_name=$request->mother_name;
       
        $student->cgpa = $request->cgpa;
        
        //$student->image = $stdImage;

        if($student->save()){

        return redirect()->back()->with('status','Student Successfully Updated!');
    	}

        return redirect()->back()->with('status','Failed!');

    }

    public function delete($id){

    	$data = Student::find($id);
        $data->delete();

        return redirect()->back()->with('status','Student Info Deleted Successfully!');
    	
    }
}
