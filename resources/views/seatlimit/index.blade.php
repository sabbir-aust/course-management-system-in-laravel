@extends('layouts.app')

@section('title','Seat Limit')

    @section('content')

        <div class="card">
            <div class="card-body">
                Seat Limit || <a href="{{ route('seatlimits.create') }}">Add Seat Limit</a>
            </div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Limit</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                
                @foreach($seatlimits as  $data)
                <tr>
                    <th scope="row">{{ $data->id }}</th>
                    <td>{{ $data->limit }}</td>
                    <td>
                        <a href="{{ route('seatlimits.edit',$data->id) }}">Edit</a> ||
                        <form id="delete-form-{{ $data->id }}" method="post" action="{{ route('seatlimits.destroy', $data->id) }}" style="display: none">
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
                {{ $seatlimits->links() }}
            </div>
        </div>

     @endsection