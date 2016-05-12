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
                              <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="contact" class="col-sm-3 control-label">Contact</label>
                <div class="col-sm-6">
                    <input type="text" name="contact" id="contact" value="{{ $otherContact->contact }}" class="form-control" required>
                </div>
            </div>

           <input type="hidden" name="phone_id" value="{{ $phone_id }}">
                          
            <div class="form-group">
                <div class="col-sm-offset-6 col-sm-4">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-edit"></i> Edit Contact
                    </button>

                     <a href="{{ URL::previous() }}" class="btn btn-danger">
                     	<span class="fa fa-chevron-right"></span>Back
                     </a>
                </div>
            </div>

        </form>

@endsection()