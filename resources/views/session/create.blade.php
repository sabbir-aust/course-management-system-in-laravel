@extends('layouts.app')

@section('title','Add Info')

@section('content')

    <div class="card">
        <div class="card-header">Add Info</div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="card-body">
            <form method="POST" action="{{ route('sessions.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="session_name" class="col-md-4 col-form-label text-md-right">Session Name</label>

                    <div class="col-md-6">
                        <input id="session_name" type="text" class="form-control{{ $errors->has('session_name') ? ' is-invalid' : '' }}" name="session_name" value="{{ old('session_name') }}" required autofocus>

                        @if ($errors->has('session_name'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('session_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>


                <div class="form-group row">
                    <label for="start_date" class="col-md-4 col-form-label text-md-right">Session Start Date</label>

                    <div class="col-md-6">
                        <input id="start_date" type="Date" class="form-control{{ $errors->has('start_date') ? ' is-invalid' : '' }}" name="start_date" value="{{ old('start_date') }}" required>

                        @if ($errors->has('start_date'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('start_date') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="end_date" class="col-md-4 col-form-label text-md-right">Session End Date</label>

                    <div class="col-md-6">
                        <input id="end_date" type="Date" class="form-control{{ $errors->has('end_date') ? ' is-invalid' : '' }}" name="end_date" value="{{ old('end_date') }}" required>

                        @if ($errors->has('end_date'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('end_date') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="reg_start_date" class="col-md-4 col-form-label text-md-right">Registration Start Date</label>

                    <div class="col-md-6">
                        <input id="reg_start_date" type="Date" class="form-control{{ $errors->has('reg_start_date') ? ' is-invalid' : '' }}" name="reg_start_date" value="{{ old('reg_start_date') }}" required>

                        @if ($errors->has('reg_start_date'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('reg_start_date') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="reg_end_date" class="col-md-4 col-form-label text-md-right">Registration End Date</label>

                    <div class="col-md-6">
                        <input id="reg_end_date" type="Date" class="form-control{{ $errors->has('reg_end_date') ? ' is-invalid' : '' }}" name="reg_end_date" value="{{ old('reg_end_date') }}" required>

                        @if ($errors->has('reg_end_date'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('reg_end_date') }}</strong>
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