@extends('layouts.app')

@section('title','Category List')

    @section('content')

        <div class="card">
            <div class="card-body">
                Category List || <a href="{{ route('categories.create') }}">Add New Category</a>
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
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                
                @foreach($categories as  $data)
                <tr>
                    <th scope="row">{{ $data->id }}</th>
                    <td>{{ $data->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit',$data->id) }}">Edit</a> ||
                        <form id="delete-form-{{ $data->id }}" method="post" action="{{ route('categories.destroy', $data->id) }}" style="display: none">
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
                {{ $categories->links() }}
            </div>
        </div>

     @endsection