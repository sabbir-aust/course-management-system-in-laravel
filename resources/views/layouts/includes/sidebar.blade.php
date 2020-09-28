<div class="col-md-3">
    <div class="card">
        <div class="card-header">{{ __('Sidebar') }}</div>


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
                <a href="{{ route('seatlimits.index') }}">Seat Limit</a>
            </div>

            

            

    </div>
</div>