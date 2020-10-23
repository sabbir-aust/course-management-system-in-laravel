@extends('layouts.app')

@section('title','Course Registration Info')

    @section('content')

    	<div class="card" style="overflow-x: auto;">

            <div class="card-header" style="background-color: #bae1ff">Registration Info</div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
           
                <!--paginate-->
     
           
        </div>
    @endsection