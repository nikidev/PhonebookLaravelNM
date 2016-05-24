@extends('layouts.app')

@section('content')


 <div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
        
            <form action="{{ url('phone/store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                {!! csrf_field() !!}
                  <div class="form-group{{ $errors->has('photoName') ? ' has-error' : '' }}">
                     <div class="image-upload">
                            <label for="file-input" class="col-sm-3 control-label image-upload">
                                 <img  id="img" src="{{ asset('/images/default-photo.png') }}">
                                 <span class="text-content"><span>Add photo</span></span>
                             </label>
                         <input name="photoName" class="form-control" id="file-input" type="file">
                         @if ($errors->has('photoName'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('photoName') }}</strong>
                                </span>
                        @endif
                    </div>
                  </div>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Name</label>

                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Phone</label>

                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">

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
                            <input type="checkbox" name="group[]" id="{{ $group->id }}" value="{{ $group->id }}">{{ $group->name }}
                        @endforeach
                    </div>
                </div>

               
                <div class="form-group">
                    <div class="col-sm-offset-6 col-sm-4">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-plus"></i> Add Phone
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
	
