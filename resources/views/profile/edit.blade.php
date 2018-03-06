@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-11 col-md-offset-1">
 
            @if(Session::has('flash_message'))
                <div class="alert alert-success col-sm-12" style="text-align:center;">
                    <em> {!! session('flash_message') !!}</em>
                </div>
            @endif
    
         <div style="text-align:center">
            <h3><span class="fa fa-user"></span> My profile</h3>
            <h6>Registered on:  {{ Auth::user()->created_at->format("d.m.Y") }}</h6>
         </div>

    		 <form action="{{ url('profile/update/'.Auth::user()->id) }}" method="POST" class="form-horizontal">

                {{ method_field('PUT') }}
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-6">
                        <input type="text" name="name" value="{{ Auth::user()->name }}" id="name"  class="form-control" required>
                    </div>
                </div>

                 <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-6">
                        <input type="email" name="email" value="{{ Auth::user()->email }}" id="name"  class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Change Password</label>

                    <div class="col-sm-6">
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                </div>
               
                <div class="form-group">
                    <div class="col-sm-offset-6 col-sm-4">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-edit"></i> Update Profile
                        </button>

                         <a href="{{ url('/home') }}" class="btn btn-danger"><span class="fa fa-chevron-right"></span>Back
                         </a>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
</div>

@endsection