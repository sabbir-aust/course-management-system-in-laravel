@extends('layouts.app')

@section('title', 'Student')
	@section('content')
	             <div class="card"  style="overflow-x: auto;">
		              <div class="card-body">
			                 Student List || <a href="{{url('student/create')}}">Add Student</a>
		              </div>
		              @if (session('status'))
                      <div class="alert alert-success" role= "alert">
                          {{ session('status') }}
                      </div>
                  @endif
	
                
		                <table class="table" style="text-align: center;">
  			               <thead>
    			               <tr>
      				              <th scope="col">#</th>
      				              <th scope="col">Name</th>
                            <!--<th scope="col">Image</th>-->
      				              <th scope="col">Father's Name</th>
                            <th scope="col">Mother's Name</th>
                            <th scope="col">Phone</th>
                            
                            <th scope="col">Email</th>
                            <th scope="col">Department</th>
                            <th scope="col">CGPA</th>
                            <!--<th scope="col">Class</th>-->
                            <th scope="col">Action</th>
    			               </tr>
  			               </thead>
  			           <tbody>
  				          @foreach($students as $student)


    			           <tr>
    				            <th scope="row">{{ $student->id }}</th>
    				              <td>{{ $student->name }}</td>
                          <!--<td><img src="{{ url('uploads/students/',$student->image) }}" style="height: 50px; width: 50px; "></td>-->
                          <td>{{ $student->father_name }}</td>
                          <td>{{ $student->mother_name }}</td>
                          <td>{{ $student->phone_number }}</td>
                          
                          <td>{{ $student->email }}</td>
                          <td>{{ $student->department->title }}</td>
                          <td>{{ $student->cgpa }}</td>
    				              <td><a href="{{ url('student/edit', $student->id) }}">Edit</a> || 
    					               <form id="delete-form-{{ $student->id }}" method="post" action="{{url ('student/delete', $student->id)}}" style="display:none;">
    						              {{csrf_field()}}
    						              {{method_field('DELETE')}}
    					               </form>

    					               <a href="" onclick="
    					                 if(confirm('Are you want to Delete this??'))
    					                   {
    						                    event.preventDefault();
    						                    document.getElementById('delete-form-{{ $student->id }}').submit();
    					                   }
    					                 else{
    						                    event.preventDefault();
    					                     }
    					                 ">Delete</a>
    				              </td>
    			           </tr>		
    			         @endforeach
  			         </tbody>
		            </table>

	           </div>	
	     @endsection
    