@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.usersidebar')
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="panel panel-default">

                        <div class="panel-heading">My Payment Method ---------------------------------------------------<a href="#addpayment"  data-toggle="modal"> <button type="button" class="btn btn-success">Add Payment</button> </a></div>
                        <div class="modal fade" id="addpayment" tabindex="1"  style="height: auto">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 style="text-decoration-color: white"></h3>

                            </div>
                            <div class="modal-body" style="height: auto">

                                <div class="col-md-8 col-lg-offset-2 ">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Add New Payment   </div>

                                        <div class="panel-body">
                                            <form class="form-horizontal" method="POST" action="{{ route('addpayment') }}">
                                                {{ csrf_field() }}

                                                <div class="form-group">
                                                    <label for="name" class="col-md-4 control-label">Card Owner</label>

                                                    <div class="col-md-6">
                                                        <input id="name" type="text" class="form-control" name="owner"  required autofocus>


                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-md-4 control-label">Card Type</label>

                                                    <div class="col-md-6" >
                                                        <select name="type" class="form-control">
                                                            <option value="Visa">Visa</option>
                                                            <option value="Master">Master</option>

                                                        </select>


                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-md-4 control-label">Card Number</label>

                                                    <div class="col-md-6">
                                                        <input id="name" type="textarea" class="form-control" name="card"  required autofocus>


                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-md-4 control-label">Expire Date</label>

                                                    <div class="col-md-6">
                                                        <input id="name" type="textarea" class="form-control" name="exp"  required autofocus>


                                                    </div>
                                                </div>

                                                <?php
                                                if (isset( Auth::user()->email )) {
                                                    echo ' <input id="name" type="hidden" value="'. Auth::user()->email.'" class="form-control" name="user" >
                                                                                      ';
                                                }

                                                ?>



                                                <div class="form-group">
                                                    <div class="col-md-6 col-md-offset-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            Add Item
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                        <div class="panel-body">

                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>

                                        <th>Card</th>
                                        <th>Type</th>
                                        <th>Owner</th>
                                        <th>Expire Date</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(sizeof($payment)>0)


                                        @foreach($payment as $method)
                                            <tr>
                                                <td>{{$method->card}}</td>
                                                <td>{{$method->type}}</td>
                                                <td>{{$method->owner}}</td>
                                                <td>{{$method->exp}}</td>
                                                 <td><button type="button" class="btn btn-primary">Change</button></td>
                                                <td><button type="button" class="btn btn-warning">Remove</button></td>

                                            </tr>
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
