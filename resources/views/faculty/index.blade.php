@extends('layouts.app')

@section('title','Faculty List')

    @section('content')

        <div class="card">
            <div class="card-header">Faculty List</div>
            <div class="card-body">
                <a class="btn btn-success btn-sm" href="{{ route('faculties.create') }}">Add New</a>
            </div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-sm">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Department</th>
                    <th scope="col">Education</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @if($faculties->count() > 0)
                @foreach($faculties as  $data)
                <tr>
                    <th scope="row">{{ $data->id }}</th>
                    <td>{{ $data->first_name }}</td>
                    <td>{{ $data->last_name }}</td>
                    <td>{{ $data->phone }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->department->title }}</td>
                    <td>{{ $data->education }}</td>
                    <td>
                        <a href="{{ route('faculties.edit',$data->id) }}">Edit</a> ||
                        <form id="delete-form-{{ $data->id }}" method="post" action="{{ route('faculties.destroy', $data->id) }}" style="display: none">
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
                @else
                    <p>No data found!</p>
                @endif
                </tbody>
            </table>
                <!--paginate-->
                {{ $faculties->links() }}
            </div>
        </div>

     @endsection