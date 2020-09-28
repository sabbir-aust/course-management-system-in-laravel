@extends('layouts.app')

@section('title','Update Seat Limit')
`
@section('content')

    <div class="card">
        <div class="card-header">Update Seat Limit #{{ $seatlimits->id }}</div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="card-body">
            <form method="POST" action="{{ route('seatlimits.update',$seatlimits->id) }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="form-group row">
                    <label for="limit" class="col-md-4 col-form-label text-md-right">Limit</label>

                    <div class="col-md-6">
                        <input id="limit" type="number" min="0" step="1" oninput="validity.valid||(value='')"  class="form-control{{ $errors->has('limit') ? ' is-invalid' : '' }}" name="limit" value="{{ $seatlimits->limit }}" required autofocus>

                        @if ($errors->has('limit'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('limit') }}</strong>
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