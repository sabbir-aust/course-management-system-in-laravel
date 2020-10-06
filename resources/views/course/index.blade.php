@extends('layouts.app')

@section('title','Course List')

    @section('content')

        <div class="card" style="overflow-x: auto;">
            <div class="card-body">
                Course List || <a href="{{ route('courses.create') }}">Add New Course</a>
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

        <div class="card">
            <div class="card-body">
                <div class="form-group row">
                    <label for="start_time" class="col-md-4 col-form-label text-md-right">Start Time</label>

                    <div class="col-md-6">
                        <input id="start_time" type="date" class="form-control{{ $errors->has('start_time') ? ' is-invalid' : '' }}" name="start_time" value="{{ old('start_time') }}" required>

                        @if ($errors->has('start_time'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('start_time') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="end_time" class="col-md-4 col-form-label text-md-right">End Time</label>

                    <div class="col-md-6">
                        <input id="end_time" type="date" class="form-control{{ $errors->has('end_time') ? ' is-invalid' : '' }}" name="end_time" value="{{ old('end_time') }}"  required>

                        @if ($errors->has('end_time'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('end_time') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button>
                        <input id="button" type="submit" name="button"/>
                        
                        </button>

                    </div>
                </div>
            </div>

            

        </div>

     @endsection