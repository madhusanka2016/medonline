@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.cashiersidebar')
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="panel panel-default">
                        <div class="panel-heading">Upcoming Prescriptions </div>

                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>

                                    <th>Topic</th>
                                    <th>User</th>
                                    <th>Repeat</th>
                                    <th>State</th>

                                    <th>Price</th>

                                    <th>View</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if(sizeof($pres)>0)


                                    @foreach($pres as $item)
                                        <tr>
                                            <td>{{$item->topic}}</td>
                                            <td>{{$item->user}}</td>
                                            <td>{{$item->repeat}}</td>
                                            <td> {{$item->state}}</td>
                                            <td>{{$item->price}}</td>
                                            <td><a href="#viewpresc{{$item->id}}"  data-toggle="modal"><button type="button" class="btn btn-warning">View</button></a></td>

                                        </tr>
                                        <div class="modal fade" id="viewpresc{{$item->id}}" tabindex="1"  style="height: auto">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3 style="text-decoration-color: white"></h3>

                                            </div>
                                            <div class="modal-body" style="height: auto">

                                                <div class="col-md-8 col-lg-offset-2 ">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">View Prescription - {{$item->topic}}  </div>

                                                        <div class="panel-body">
                                                            <form class="form-horizontal" method="POST" >
                                                                {{ csrf_field() }}

                                                                <div class="form-group">
                                                                    <label for="name" class="col-md-4 control-label">Topic</label>

                                                                    <div class="col-md-6">
                                                                        <label for="name" class="col-md-12 control-label">{{$item->topic}}</label>


                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="name" class="col-md-4 control-label">Descrption</label>

                                                                    <div class="col-md-6">
                                                                        <label for="name" class="col-md-12 control-label">{{$item->desc}}</label>


                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="name" class="col-md-4 control-label">Link for Image</label>

                                                                    <div class="col-md-6">
                                                                        <label for="name" class="col-md-12 control-label">{{$item->link}}</label>


                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="name" class="col-md-4 control-label">Payment</label>

                                                                    <div class="col-md-6">
                                                                        <label for="name" class="col-md-12 control-label">{{$item->payment}}</label>


                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="name" class="col-md-4 control-label">Repeat</label>

                                                                    <div class="col-md-6">
                                                                        <label for="name" class="col-md-12 control-label">{{$item->repeat}}</label>


                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="name" class="col-md-4 control-label">Price</label>

                                                                    <div class="col-md-6">
                                                                        <label for="name" class="col-md-12 control-label">Rs. {{$item->price}}.00</label>


                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="name" class="col-md-4 control-label">State</label>

                                                                    <div class="col-md-6">
                                                                        <label for="name" class="col-md-12 control-label">{{$item->state}}</label>


                                                                    </div>
                                                                </div>




                                                                <div class="form-group">
                                                                    <div class="col-md-6 col-md-offset-4">
                                                                        <a href="/viewpres/{{$item->id}}"> <button class="btn btn-primary">
                                                                                Open Prescription
                                                                            </button> </a>

                                                                    </div>

                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                        </div>
                                    @endforeach

                                @else
                                    <div class="row">
                                        <h4>Sorry! No items found</h4>
                                    </div>
                                @endif



                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
