@extends('layouts.app')

@section('title','Edit Session Info')
`
@section('content')

    <div class="card">
        <div class="card-header">Update Info #{{ $session->id }}</div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="card-body">
            <form method="POST" action="{{ route('session.update',$session->id) }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}

                <div class="form-group row">
                    <label for="session_name" class="col-md-4 col-form-label text-md-right">Session Name</label>

                    <div class="col-md-6">
                        <input id="session_name" type="text" class="form-control{{ $errors->has('session_name') ? ' is-invalid' : '' }}" name="session_name" value="{{ $session->session_name }}" required autofocus>

                        @if ($errors->has('session_name'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('session_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

            

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection