@extends('layouts.app')


@section('content')

	 <form action="{{ url('group/store') }}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="service" class="col-sm-3 control-label">Service</label>

                <div class="col-sm-2">
                    <select class="form-control">
                        @foreach(Auth::user()->service as $service)
                              <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="contact" class="col-sm-3 control-label">Contact</label>
                <div class="col-sm-6">
                    <input type="text" name="contact" id="contact" class="form-control" required>
                </div>
            </div>

                          
            <div class="form-group">
                <div class="col-sm-offset-6 col-sm-4">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Contact
                    </button>

                     <a href="{{-- url('contacts/'. $phone->id) --}}" class="btn btn-danger">
                     	<span class="fa fa-chevron-right"></span>Back
                     </a>
                </div>
            </div>

        </form>

@endsection()