@extends('layouts.app')


@section('content')

	 <form action="{{ url('service/store') }}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Service name</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
            </div>

                          
            <div class="form-group">
                <div class="col-sm-offset-6 col-sm-4">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Service
                    </button>

                     <a href="{{ url('/services') }}" class="btn btn-danger">
                     	<span class="fa fa-chevron-right"></span>Back
                     </a>
                </div>
            </div>

        </form>

@endsection()