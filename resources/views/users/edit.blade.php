@extends('layouts.app')

@section('content')

 <form action="{{ url('user/update/'. $user->id) }}" method="POST" class="form-horizontal">

            {{ method_field('PUT') }}
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Name</label>

                <div class="col-sm-6">
                    <input type="text" name="name" value="<?php echo (isset($user->name) ? $user->name :  ''); ?>" id="name"  class="form-control" required>

                </div>
            </div>

             <div class="form-group">
                    <label for="group" class="col-sm-3 control-label">Choose a role:</label>

                    
                        <div class="col-sm-6">
                            @if(in_array(Auth::user()->isAdmin, $selectedRole))
                              <input type="checkbox" name="isAdmin"  value="{{ Auth::user()->isAdmin }}" checked>isAdmin
                            @else
                                <input type="checkbox" name="isAdmin"  value="{{ Auth::user()->isAdmin }}">isAdmin
                            @endif
                        </div>
                    
            </div>

           
            <div class="form-group">
                <div class="col-sm-offset-6 col-sm-4">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-edit"></i> Edit User
                    </button>

                    <a href="{{ url('/users') }}" class="btn btn-danger"><span class="fa fa-chevron-right"></span>Back
                     </a>
                </div>
            </div>

            
        </form>

@endsection()