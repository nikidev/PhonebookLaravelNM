@extends('layouts.app')


@section('content')

	 <form action="{{ url('contact/store') }}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="service" class="col-sm-3 control-label">Service</label>

                <div class="col-sm-2">
                    <select name="service" class="form-control">
                  
                        @foreach($services as $service)
                              <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                  
                    </select>
                </div>
            </div>

            <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                <label for="contact" class="col-sm-3 control-label">Contact</label>
                <div class="col-sm-6">
                    <input type="text" name="contact" id="contact" class="form-control" value="{{ old('contact') }}">

                    @if ($errors->has('contact'))
                            <span class="help-block">
                                <strong>{{ $errors->first('contact') }}</strong>
                            </span>
                    @endif
                </div>
            </div>

           
            <input type="hidden" name="phone_id" value="{{ $phone_id }}">
            
                          
            <div class="form-group">
                <div class="col-sm-offset-6 col-sm-4">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Contact
                    </button>

                     <a href="{{ url('/contacts/' . $phone_id) }}" class="btn btn-danger">
                     	<span class="fa fa-chevron-right"></span>Back
                     </a>
                </div>
            </div>

        </form>

@endsection()