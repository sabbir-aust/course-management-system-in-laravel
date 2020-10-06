<div class="col-md-3">
    <div class="card">
        <div class="card-header">{{ __('Sidebar') }}</div>



        @if(Auth::user()->role == "admin")
            <div class="card-body">
                <a href="{{ route('faculties.index') }}">Faculties</a>
            </div>

            <div class="card-body">
                <a href="{{ url('students') }}">Students</a>
            </div>

            <div class="card-body">
                <a href="{{ url('departments') }}">Department</a>
            </div>

            <div class="card-body">
                <a href="{{ url('classes') }}">Class</a>
            </div>

            <div class="card-body">
                <a href="{{ route('categories.index') }}">Category</a>
            </div>

            <div class="card-body">
                <a href="{{ route('courses.index') }}">Add Course</a>
            </div>

            <div class="card-body">
                <a href="{{ route('registrations.index') }}">Course Registration</a>
            </div>

            

            @endif

            @if(Auth::user()->role == "student")
            <div class="card-body">
                <a href="">Profile</a>
            </div>

            <div class="card-body">
                <a href="{{ route('registrations.index') }}">Course Registration</a>
            </div>
            @endif


            

            

    </div>
</div>