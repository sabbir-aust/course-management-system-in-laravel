@extends('layouts.app')

@section('title', 'Student Details')
@section('content')
	             <div class="card">
		              <div class="card-header">Student List</div>
		              @if (session('status'))
                      <div class="alert alert-success" role= "alert">
                          {{ session('status') }}
                      </div>
                  @endif

                  <div scope="col">
                    
                    <form action="/search" method="get">
                      <div class="input-group">
                        <input type="search" placeholder="Search by ID" name="search" class="form-control">
                        <span class="input-group-prepend">
                          <button type="submit" class="btn btn-primary">Search</button>
                        </span>
                      </div>
                    </form>
                  </div>

                  <form class="table-responsive"><br>
                  @csrf
                
		                <table class="table table-sm" style="text-align: center;">
                <thead>
                <tr>
                    
                    <th scope="col">Student Name</th>
                    <th scope="col">Student ID</th>
                    <th scope="col">Course Code</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Category</th>
                    <!-- <th scope="col">Class Room</th>
                    <th scope="col">Faculty</th>
                    <th scope="col">Class Start Time</th>
                    <th scope="col">Class End Time</th> -->
                    
                </tr>
                </thead>
                <tbody>

                
                <tr>
                    
                    @foreach($all as $data)

                    <td>{{ $data->student->name }}</td>
                    <td>{{ $data->student->roll }}</td>
                    <td>{{ $data->course->course_code }}</td>
                    <td>{{ $data->course->course_name }}</td>
                    <td>{{ $data->course->category->name }}</td>
                   
                    
                    </tr>
                    @endforeach
            
                </tbody>


            </table>
              </form>

	           </div>	
	     @endsection
    