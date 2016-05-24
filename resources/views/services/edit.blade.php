@extends('layouts.app')

@section('content')

 <form action="{{ url('service/update/'. $service->id) }}" method="POST" class="form-horizontal">

            {{ method_field('PUT') }}
            {!! csrf_field() !!}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-sm-3 control-label">Service name</label>

                <div class="col-sm-6">
                    <input type="text" name="name" value="<?php echo (isset($service->name) ? $service->name :  ''); ?>" id="name"  class="form-control">

                    @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                    @endif

                </div>
            </div>


           
            <div class="form-group">
                <div class="col-sm-offset-6 col-sm-4">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-edit"></i> Edit Service
                    </button>

                    <a href="{{ url('/services') }}" class="btn btn-danger"><span class="fa fa-chevron-right"></span>Back
                     </a>
                </div>
            </div>

            
        </form>

@endsection()