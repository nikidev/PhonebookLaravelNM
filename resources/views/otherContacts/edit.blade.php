@extends('layouts.app')


@section('content')

	 <form action="{{ url('contact/update/'. $otherContact->id) }}" method="POST" class="form-horizontal">
            {{ method_field('PUT') }}
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="service" class="col-sm-3 control-label">Service</label>

                <div class="col-sm-2">
                    <select name="service" class="form-control">
                        @foreach($services as $service)
                            @if($otherContact->service_id == $service->id)
                                <option style="color:#00BCD4;" selected="true"  value="{{ $otherContact->service_id }}">{{ $otherContact->service->name }}</option>
                            @else
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                <label for="contact" class="col-sm-3 control-label">Contact</label>
                <div class="col-sm-6">
                    <input type="text" name="contact" id="contact" value="{{ $otherContact->contact }}" class="form-control">

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
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-edit"></i> Edit Contact
                    </button>

                     <a href="{{ url('/contacts/' . $phone_id) }}" class="btn btn-danger">
                     	<span class="fa fa-chevron-right"></span>Back
                     </a>
                </div>
            </div>

        </form>

@endsection()