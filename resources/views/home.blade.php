@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
                <h5>
                    Your contacts: ({{Auth::user()->phone()->count()}})
                </h5>

                <div class="form-group waves-effect waves-light" id="searchbar">
                    <span class="fa fa-search search-icon"></span>
                    <input type="text" name="search" id="search" class="form-control searchform" placeholder="Type and Search">  
                </div>
                
                <a href="{{ url('phone/create') }}" class="btn btn-primary btn-add-phone"><span class="glyphicon glyphicon-plus"></span>Add new phone
                </a>

            <table class="table table-hover table-responsive" id="tblData">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Groups</th>
                        <th>Other contacts</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach (Auth::user()->phone as $phone)
                            <tr>
                                <td>
                                @if(isset($phone->photo->file_path))
                                    <a href="{{ url($phone->photo->file_path) }}" id="phone-photo" data-lightbox="phone-photo">
                                        <img src="{{ url($phone->photo->file_path) }}">
                                    </a>
                                @else
                                   <a href="{{ asset('/images/default-photo.png') }}" id="phone-photo" data-lightbox="phone-photo">
                                      <img  src="{{ asset('/images/default-photo.png') }}">
                                  </a>
                                @endif
                                </td>
                                <td>{{ $phone->name }}</td>
                                <td>{{ $phone->phone }}</td>
                                <td>
                                  @foreach($phone->group as $group)
                                      {{ $group->name }}<br>
                                  @endforeach
                                </td>
                                <td>
                                  <a href="{{ url('contacts/'. $phone->id) }}" class="btn btn-info">
                                        <span class="fa fa-phone"></span>
                                        <span class="fa fa-facebook-official"></span>
                                        <span class="fa fa-envelope"></span>
                                        <span class="fa fa-skype"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ url('phone/edit/'. $phone->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>Edit
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-danger delete-button" data-toggle="modal" data-target="#myModal" data-action="{{ url('phone/delete/'. $phone->id) }}"><span class="fa fa-trash-o"></span>Delete</a>
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
         </div>
    </div>
</div>

<!-- Modal Form Delete-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete Contact</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete the selected contact ?</p>
      </div>
      <div class="modal-footer">
          <form method="get" id="delete-form">
          {!! csrf_field() !!}
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary btn-conf">Confirm delete</button>
          </form>
        
      </div>
    </div>
  </div>
</div>



@endsection
