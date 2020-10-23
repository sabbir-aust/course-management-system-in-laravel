@extends('layouts.app')

@section('content')

    <div class="card" style="background-color: #f1f9ff">
        <div class="card-header" style="background-color: #bae1ff">Profile</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

<html>
<head>
</head>
<body>
   @if(Auth::user()->role == "student")
    <div class="container emp-profile">
            <form method="get">
                <div class="row">
                    <div class="col-md-6">
                        <div class="profile-head">
                             
                                    <h5>
                                        Welcome {{ $student->name }}
                                    </h5>
                                  
                        </div>
                    </div><br><br><br>
                    
                </div>

                <div class="container">
                <div class="row">
                    
                    <div class="col-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $student->user->email }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone Number</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $student->phone_number }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Roll</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $student->roll }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Registration ID</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $student->reg_id }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>CGPA</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $student->cgpa }}</p>
                                            </div>
                                        </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-body">
                             <a class="btn btn-success btn-sm" href="{{ url('student/edit', $student->id) }}">Edit Information</a>
                      </div>

            </form>           
        </div>
       @endif


       @if(Auth::user()->role == "admin")
    <div class="container emp-profile">
            <form method="get">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Welcome {{ $user->name }}</h4>
                        <div class="profile-head">
                        </div>
                    </div><br><br><br>
                    
                </div>
                <div class="row">
                    
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $user->email }}</p>
                                            </div>
                                        </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </form>           
        </div>
       @endif
</body>
</html>

<!------ Include the above in your HEAD tag ---------->


        </div>
    </div>
@endsection