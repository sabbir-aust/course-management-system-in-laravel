<div class="col-md-3">
    <div class="card" >
        <div class="card-header" style="background-color: #bae1ff">{{ __('Menu') }}</div>



        @if(Auth::user()->role == "admin")
            <div class="card-body">
                <a href="{{ route('faculties.index') }}">Add Faculty Details</a>
            </div>

            <div class="card-body">
                <a href="{{ url('students') }}">Add New Student</a>
            </div>

            <div class="card-body">
                <a href="{{ url('studentdetails') }}">Student Details</a>
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
                <a href="{{ route('sessions.index') }}">Edit Session Info</a>
            </div>


            

            @endif

            @if(Auth::user()->role == "student")
            <div class="card-body" >
                <a href="{{ url('home') }}">Profile</a>
            </div>

            <div class="card-body" >
                <a href="{{ route('registrations.index') }}">Course Registration</a>
            </div>

            <div class="card-body" >
                <a href="{{ url('takencourses')}}">Taken Course</a>
            </div>

            @endif


            

            

    </div>
</div>