@extends('layouts.app')

@section('title','Add New Course')

@section('content')

    <div class="card">
        <div class="card-header">Add New Course</div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="card-body">
            <form method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="course_code" class="col-md-4 col-form-label text-md-right">Course Code</label>

                    <div class="col-md-6">
                        <input id="course_code" type="text" class="form-control{{ $errors->has('course_code') ? ' is-invalid' : '' }}" name="course_code" value="{{ old('course_code') }}" required autofocus>

                        @if ($errors->has('course_code'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('course_code') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="course_name" class="col-md-4 col-form-label text-md-right">Course Name</label>

                    <div class="col-md-6">
                        <input id="course_name" type="text" class="form-control{{ $errors->has('course_name') ? ' is-invalid' : '' }}" name="course_name" value="{{ old('course_name') }}" required>

                        @if ($errors->has('course_name'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('course_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="category_id" class="col-md-4 col-form-label text-md-right">Category</label>

                    <div class="col-md-6">
                        <select class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" required>
                            <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('category_id'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('category_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                            <label for="classes_id" class="col-md-4 col-form-label text-md-right">Class</label>

                            <div class="col-md-6">
                                
                                <select class="form-control {{ $errors->has('classes_id') ? ' is-invalid':''}}" name="classes_id" required>
                                    <option value="">Select One</option>
                                    @foreach($classes as $class)

                                    <option value="{{ $class-> id}}">{{ $class->title }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('classes_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('classes_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                </div>


                <div class="form-group row">
                    <label for="faculty_id" class="col-md-4 col-form-label text-md-right">Faculty</label>

                    <div class="col-md-6">
                        <select class="form-control{{ $errors->has('faculty_id') ? ' is-invalid' : '' }}" name="faculty_id" required>
                            <option value="">Select Department</option>
                        @foreach($faculties as $faculty)
                            <option value="{{ $faculty->id }}">{{ $faculty->first_name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('faculty_id'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('faculty_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="class_start_time" class="col-md-4 col-form-label text-md-right">Class Start Time</label>

                    <div class="col-md-6">
                        <input id="class_start_time" type="Time" class="form-control{{ $errors->has('class_start_time') ? ' is-invalid' : '' }}" name="class_start_time" value="{{ old('class_start_time') }}" required>

                        @if ($errors->has('class_start_time'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('class_start_time') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="class_end_time" class="col-md-4 col-form-label text-md-right">Class End Time</label>

                    <div class="col-md-6">
                        <input id="class_end_time" type="Time" class="form-control{{ $errors->has('class_end_time') ? ' is-invalid' : '' }}" name="class_end_time" value="{{ old('class_end_time') }}" required>

                        @if ($errors->has('class_end_time'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('class_end_time') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="seatlimit" class="col-md-4 col-form-label text-md-right">Seat Limit</label>

                    <div class="col-md-6">
                        <input id="seatlimit" type="text" class="form-control{{ $errors->has('seatlimit') ? ' is-invalid' : '' }}" name="seatlimit" value="{{ old('seatlimit') }}" required>

                        @if ($errors->has('seatlimit'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('seatlimit') }}</strong>
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