@extends('layouts.app')

@section('title','Course Registration')

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
            <form class="table-responsive" method="post" action="{{ route('registrations.store') }}" enctype="multipart/form-data" style="background-color:#f1f9ff">
                @csrf
                <table class="table table-sm" style="text-align: center;">
                <thead>
                <tr>
                    
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
                    
                    
                    <td>{{ $data->course_code }}</td>
                    <td>{{ $data->course_name }}</td>
                    <td>{{ $data->category->name }}</td>
                    <td>{{ $data->classes->title }}</td>
                    <td>{{ $data->faculty->first_name }}</td>
                    <td>{{ \Carbon\Carbon::parse($data->class_start_time)->format('h:i A') }}</td>
                    <td>{{ \Carbon\Carbon::parse($data->class_end_time)->format('h:i A') }}</td>
                    <td>{{ $data->seatlimit }}</td>

                    @if(Auth::user()->role == "student")
                    
                    <td>
                        
                        <Button type="submit" class="btn btn-outline-success" name="registration" value="{{ $data->id }}">Select</Button> 
                           
                        
                    </td>
                    @endif  
                </tr>
                    @endforeach

                
                </tbody>

            </table>

            </form>
                <!--paginate-->
                {{ $courses->links() }}
           
        </div><br>
        </div>
</body>
</html>
     @endsection