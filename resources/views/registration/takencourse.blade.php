@extends('layouts.app')

@section('title','Taken Course')

@section('content')
<!DOCTYPE html>
<html>
<head>
    
</head>
<body>


        <div class="card" style="overflow-x: auto;">

            <div class="card-header" style="background-color: #bae1ff">Course List</div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form class="table-responsive" style="background-color:#f1f9ff"><br>
                @csrf
                <table class="table table-sm" style="text-align: center;">
                <thead>
                <tr>
                    
                    <th scope="col">Course Code</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Class Room</th>
                    <th scope="col">Faculty</th>
                    <th scope="col">Class Start Time</th>
                    <th scope="col">Class End Time</th>
                    
                </tr>
                </thead>
                <tbody>

                
                <tr>
                    
                    @foreach($taken as $data)

                    <td>{{ $data->course->course_code }}</td>
                    <td>{{ $data->course->course_name }}</td>
                    <td>{{ $data->course->category->name }}</td>
                    <td>{{ $data->course->classes->title }}</td>
                    <td>{{ $data->course->faculty->first_name }}</td>
                    <td>{{ \Carbon\Carbon::parse($data->course->class_start_time)->format('h:i A') }}</td>
                    <td>{{ \Carbon\Carbon::parse($data->course->class_end_time)->format('h:i A') }}</td>
                    
                    </tr>
                    @endforeach
            
                </tbody>


            </table>




            </form>
                <!--paginate-->
         
           
        </div><br>
        </div>
</body>
</html>
     @endsection