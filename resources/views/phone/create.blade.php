@extends('layouts.app')

@section('content')

    
 
 
   
        
        <form action="{{ url('phone/store') }}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Name</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="name" class="form-control" required>

                </div>
            </div>

             <div class="form-group">
                <label for="phone" class="col-sm-3 control-label">Phone</label>

                <div class="col-sm-6">
                    <input type="text" name="phone" id="phone" class="form-control" required>
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
    

@endsection
	
