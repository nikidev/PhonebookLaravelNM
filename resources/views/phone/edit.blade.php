@extends('layouts.app')
@section('content')


   
 <div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">

            <form action="{{ url('phone/update/'. $phone->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">

                {{ method_field('PUT') }}
                {!! csrf_field() !!}
            <div class="form-group{{ $errors->has('photoName') ? ' has-error' : '' }}">
                <div class="image-upload">
                            <label for="file-input" class="col-sm-3 control-label image-upload">
                            @if(isset($phone->photo->file_path))
                                 <img id="img" src="{{ url($phone->photo->file_path) }}">
                            @else
                                 <img id="img" src="{{ asset('/images/default-photo.png') }}">
                            @endif
                                 <span class="text-content"><span>Change photo</span></span>
                             </label>
                         <input name="photoName" class="form-control"  id="file-input" type="file">

                         @if ($errors->has('photoName'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('photoName') }}</strong>
                                </span>
                        @endif
                    </div>
            </div>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-sm-3 control-label">Name</label>

                    <div class="col-sm-6">
                        <input type="text" name="name" value="<?php echo (isset($phone->name) ? $phone->name :  ''); ?>" id="name"  class="form-control">

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>

                 <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                    <label for="phone" class="col-sm-3 control-label">Phone</label>

                    <div class="col-sm-6">
                        <input type="text" name="phone" value="<?php echo (isset($phone->phone) ? $phone->phone :  ''); ?>" id="phone" class="form-control">

                        @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif

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
        </div>
    </div>
</div>


@endsection