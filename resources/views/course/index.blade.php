@extends('layouts.app')

@section('title','Course List')

    @section('content')

        <div class="card" style="overflow-x: auto;">
            <div class="card-header">Course List</div>
            <div class="card-body">
                <a class="btn btn-success btn-sm" href="{{ route('courses.create') }}">Add New Course</a>
            </div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            
                <table class="table table-sm" style="text-align: center;">
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
                    <td>{{ $data->education }}</td>
                    <td>
                        <a href="{{ route('courses.edit',$data->id) }}">Edit</a> ||
                        <form id="delete-form-{{ $data->id }}" method="post" action="{{ route('courses.destroy', $data->id) }}" style="display: none">
                            {{csrf_field()}}
                            {{ method_field('DELETE') }}
                        </form>

                        <a href="" onclick="
                                if(confirm('Are you sure, You want to Delete this ??'))
                                {
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $data->id }}').submit();
                                }
                                else {
                                event.preventDefault();
                                }">Delete
                        </a>
                    </td>
                </tr>
                    @endforeach
                
                </tbody>
            </table>
                <!--paginate-->
                {{ $courses->links() }}
           
        </div><br>

        

     @endsection