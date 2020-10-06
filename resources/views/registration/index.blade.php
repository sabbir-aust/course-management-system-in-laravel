@extends('layouts.app')

@section('title','Course Registration')

    @section('content')
<!DOCTYPE html>
<html>
<head>
    
</head>
<body>


        <div class="card" style="overflow-x: auto;">

            <div class="card-body">
                <h4>Course List</h4> 
            </div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            
                <table class="table" style="text-align: center;">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Course Code</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Class</th>
                    <th scope="col">Faculty</th>
                    <th scope="col">Class Start Time</th>
                    <th scope="col">Class End Time</th>
                    <th scope="col">Seat Limit</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                
                @foreach($courses as  $data)
                <tr>
                    
                    <th scope="row"  value="Ascending">{{ $data->id }}</th>
                    <td>{{ $data->course_code }}</td>
                    <td>{{ $data->course_name }}</td>
                    <td>{{ $data->category->name }}</td>
                    <td>{{ $data->classes->title }}</td>
                    <td>{{ $data->faculty->first_name }}</td>
                    <td>{{ \Carbon\Carbon::parse($data->class_start_time)->format('h:i A') }}</td>
                    <td>{{ \Carbon\Carbon::parse($data->class_end_time)->format('h:i A') }}</td>
                    <td>{{ $data->seatlimit }}</td>
                    <td><input type="submit" valur="select" class="btn btn-primary"></input></td>
                    
                    
                </tr>
                    @endforeach
                
                </tbody>
            </table>
                <!--paginate-->
                {{ $courses->links() }}
           
        </div><br>
        </div>
</body>
</html>
     @endsection