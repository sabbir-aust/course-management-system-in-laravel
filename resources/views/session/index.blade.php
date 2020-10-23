@extends('layouts.app')

@section('title','Session Info')

    @section('content')

        <div class="card" style="overflow-x: auto;">
            <div class="card-header">Sessions</div>
            <div class="card-body">
                <a class="btn btn-success btn-sm" href="{{ route('sessions.create') }}">Add Session & Registration Time</a>
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
                    <th scope="col">Session Name</th>
                    <th scope="col">Session Start</th>
                    <th scope="col">Session End</th>
                    <th scope="col">Registration Start</th>
                    <th scope="col">Registration End</th>
                    <!-- <th scope="col">Action</th> -->
                </tr>
                </thead>
                <tbody>
                
                @foreach($sessions as  $data)
                <tr>
                    <th scope="row"  value="Ascending">{{ $data->id }}</th>
                    <td>{{ $data->session_name }}</td>
                    <td>{{ \Carbon\Carbon::parse($data->start_date)->format('d/m/y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($data->end_date)->format('d/m/y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($data->reg_start_date)->format('d/m/y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($data->reg_end_date)->format('d/m/y') }}</td>
                    
                    <!-- <td>
                        <a href="{{ route('sessions.edit',$data->id) }}">Edit</a> ||
                        <form id="delete-form-{{ $data->id }}" method="post" action="{{ route('sessions.destroy', $data->id) }}" style="display: none">
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
                    </td> -->
                </tr>
                    @endforeach
                
                </tbody>
            </table>
                <!--paginate-->
              
           
        </div><br>

     @endsection