@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
                <h5>
                    Your contacts: ({{Auth::user()->phone()->count()}})
                </h5>

                <div class="form-group waves-effect waves-light" id="searchbar">
                    <input type="text" name="search" id="search" class="form-control searchform" placeholder="Type and Search">
                </div>
                
                <a href="{{ url('phone/create') }}" class="btn btn-primary btn-add-phone"><span class="glyphicon glyphicon-plus"></span>Add new phone
                </a>

            <table class="table table-hover table-responsive" id="tblData">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach (Auth::user()->phone as $phone)
                            <tr>
                                <td>{{ $phone->name }}</td>
                                <td>{{ $phone->phone }}</td>
                                <td>
                                    <a href="{{ url('phone/edit/'. $phone->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>Edit
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ url('phone/delete/'. $phone->id) }}" class="btn btn-danger"><span class="fa fa-trash-o"></span>Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
    </div>
</div>

@endsection
