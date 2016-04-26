@extends('layouts.app')
@section('content')


 <form action="{{ url('phone/update/'. $phone->id) }}" method="POST" class="form-horizontal">

            {{ method_field('PUT') }}
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Name</label>

                <div class="col-sm-6">
                    <input type="text" name="name" value="<?php echo (isset($phone->name) ? $phone->name :  ''); ?>" id="name"  class="form-control" required>

                </div>
            </div>

             <div class="form-group">
                <label for="phone" class="col-sm-3 control-label">Phone</label>

                <div class="col-sm-6">
                    <input type="text" name="phone" value="<?php echo (isset($phone->phone) ? $phone->phone :  ''); ?>" id="phone" class="form-control" required>
                </div>
            </div>



             <div class="form-group">
                <label for="group" class="col-sm-3 control-label">Choose a group:</label>

                <div class="col-sm-6">
                    @foreach(Auth::user()->group as $group)
                        @if(in_array($group->id, $selectedGroups))
                             <input type="checkbox" name="group[]" id="group" value="{{ $group->id }}" checked>
                        @else
                            <input type="checkbox" name="group[]" id="group" value="{{ $group->id }}" >
                        @endif
                             {{ $group->name }}
                    @endforeach
                </div>
            </div>
            
           
            <div class="form-group">
                <div class="col-sm-offset-6 col-sm-4">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-edit"></i> Edit Phone
                    </button>

                    <a href="{{ url('/home') }}" class="btn btn-danger"><span class="fa fa-chevron-right"></span>Back
                     </a>
                </div>
            </div>

            
        </form>


@endsection