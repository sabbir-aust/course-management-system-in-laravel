<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Department;
use App\Classes;
//use Intervention\Image\Facades\Image;


class StudentController extends Controller
{
    public function index(){

    	$students = Student::all();


        
    	return view('student.index', compact('students'));

    }

    public function create(){

       $departments = Department::all();
        //$classes = Classes::all();
    	return view('student.create',compact('departments'));
    	
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
            'email' => $request->email,
            'roll' => $request->roll,
            'reg_id' => $request->reg_id,
            'department_id' => $request->department_id,
            //'classes_id' => $request->classes_id,
            'mother_name' => $request->mother_name,
            'present_address' => $request->present_address,
            'permanent_address' => $request->permanent_address,
            'cgpa' => $request->cgpa, 
            //'image' => $stdImage,

        ]);




    	//Classes::create([
    		//'title'=>$request->title
    	//]);
        


    	return redirect()->back()->with('status','Student Successfully Saved !');
    	
    }

    public function edit($id){

    	$data=Student::find($id);
        $departments= Department::all();
        //$classes = Classes::all();
    	return view('student.edit',compact('data','departments'));
    	
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
        $student->email = $request->email;
        $student->roll = $request->roll;
        $student->reg_id = $request->reg_id;
        $student->department_id= $request->department_id;
        //$student->classes_id = $request->classes_id;
        $student->mother_name=$request->mother_name;
        $student->present_address = $request->present_address;
        $student->permanent_address= $request->permanent_address;
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
