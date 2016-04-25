@extends('layouts.app')

@section('content')

 <form action="{{ url('group/update/'. $group->id) }}" method="POST" class="form-horizontal">

            {{ method_field('PUT') }}
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Name</label>

                <div class="col-sm-6">
                    <input type="text" name="name" value="<?php echo (isset($group->name) ? $group->name :  ''); ?>" id="name"  class="form-control" required>

                </div>
            </div>


           
            <div class="form-group">
                <div class="col-sm-offset-6 col-sm-4">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-edit"></i> Edit Group
                    </button>

                    <a href="{{ url('/groups') }}" class="btn btn-danger"><span class="fa fa-chevron-right"></span>Back
                     </a>
                </div>
            </div>

            
        </form>

@endsection()