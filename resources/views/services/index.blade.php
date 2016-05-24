@extends('layouts.app')

@section('content')
	<div class="container">
 		 <div class="row">
			<div class="col-md-10 col-md-offset-1">

			<a href="{{ url('service/create') }}" class="btn btn-primary btn-add-phone"><span class="glyphicon glyphicon-plus"></span>Add new service
                </a>

				 <table class="table table-hover table-responsive" id="tblData">
	                <thead>
	                    <tr>
	                        <th>Name</th>
	                        <th>Actions</th>
	                    </tr>
	                </thead>
	                <tbody>
	                        @foreach ($services as $service)
	                            <tr>
	                                <td>{{ $service->name }}</td>
	                                
	                                <td>
	                                    <a href="{{ url('service/edit/'. $service->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>Edit
	                                    </a>
	                                </td>
	                                <td>
	                                    <a class="btn btn-danger delete-button" data-toggle="modal" data-target="#myModal" data-action="{{ url('service/delete/'. $service->id) }}"><span class="fa fa-trash-o"></span>Delete</a>
	                                </td>
	                            </tr>
	                        @endforeach
	                </tbody>
	            </table>
			</div> 
		</div>
	</div>


	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete service</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete the selected service ?</p>
      </div>
      <div class="modal-footer">
          <form method="get" id="delete-form">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary btn-conf">Confirm delete</button>
          </form>
        
      </div>
    </div>
  </div>
</div>


@endsection