@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.usersidebar')
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="panel panel-default">

                        <div class="panel-heading">User Details ---------------------------------------------------<a href="#addpayment"  data-toggle="modal"> <button type="button" class="btn btn-success">Change</button> </a></div>

                        <div class="panel-body">

                            <form class="form-horizontal" method="POST" >
                                {{ csrf_field() }}
                                @if(sizeof($details)>0)


                                    @foreach($details as $item)
                                        <div class="form-group">
                                            <label for="name" class="col-md-4 control-label">Name</label>

                                            <div class="col-md-6">
                                                <label for="name" class="control-label">{{$item->name}}</label>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-md-4 control-label">Email</label>

                                            <div class="col-md-6">
                                                <label for="name" class="control-label">{{ Auth::user()->email }}</label>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-md-4 control-label">Phone Number</label>

                                            <div class="col-md-6">
                                                <label for="name" class="control-label">{{$item->phone}}</label>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="name" class="col-md-4 control-label">Address</label>

                                            <div class="col-md-6">
                                                <label for="name" class="control-label">{{$item->ad1}}</label>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-md-4 control-label"></label>

                                            <div class="col-md-6">
                                                <label for="name" class="control-label">{{$item->ad2}}</label>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-md-4 control-label"></label>

                                            <div class="col-md-6">
                                                <label for="name" class="control-label">{{$item->ad3}}</label>

                                            </div>
                                        </div>
                                    @endforeach

                                @else
                                    <div class="row">
                                        <h4>Sorry! No items found</h4>
                                    </div>
                                @endif

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@if(sizeof($details)>0)


    @foreach($details as $item)
        <div class="modal fade" id="add{{$item->id}}" tabindex="1"  style="height: auto">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 style="text-decoration-color: white"></h3>

            </div>


        </div>

    @endforeach

@else
    <div class="row">
        <h4>Sorry! No items found</h4>
    </div>
@endif