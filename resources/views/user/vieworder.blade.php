@extends('layouts.app')

@section('content')
    <div class="container">

        @if( Auth::user()->email =="admin@admin.com")
            @include('partials.adminsidebar')
        @elseif(Auth::user()->email=="cashier@cashier.com")
            @include('partials.cashiersidebar')
        @else
            @include('partials.usersidebar')
        @endif

        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="panel panel-default">
                        <div class="panel-heading">View Order Details </div>

                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>

                                    <th>Order Id</th>
                                    <th>User</th>
                                    <th>Price</th>

                                    <th>State</th>


                                    <th>Invoice</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if(sizeof($orders)>0)


                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order->orderid}}</td>
                                            <td>{{$order->user}}</td>
                                            <td>{{$order->price}}</td>
                                            <td>{{$order->state}}</td>
                                            <td><a href="#invoice{{$order->id}}"  data-toggle="modal"><button type="button" class="btn btn-warning">Print Invoice</button></a></td>
                                            <?php
                                            if (isset( Auth::user()->email )) {

                                               if (Auth::user()->email=="cashier@cashier.com"){
                                                    echo '  <td><a href="#process'.($order->id).'"  data-toggle="modal"><button type="button" class="btn btn-success">Process Order</button></a>
                            </td>';
                                                }


                                            }

                                            ?>
                                        </tr>

                                    @endforeach

                                @else
                                    <div class="row">
                                        <h4>Sorry! No items found</h4>
                                    </div>
                                @endif



                                </tbody>
                            </table>
                            <table class="table table-hover">
                                <thead>
                                <tr>

                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>

                                    <th>Sub Total</th>


                                </tr>
                                </thead>
                                <tbody>

                                @if(sizeof($details)>0)


                                    @foreach($details as $item)
                                        <tr>
                                            <td>{{$item->i_name}}</td>

                                            <td>{{$item->i_qty}}</td>
                                            <td>Rs. {{$item->i_price}}.00</td>
                                            <td>Rs. {{$item->i_price * $item->i_qty}}.00</td>


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
@if(sizeof($orders)>0)


    @foreach($orders as $order)

        <div class="modal fade" id="invoice{{$order->id}}" tabindex="1"  style="height: auto">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 style="text-decoration-color: white"></h3>

            </div>
            <div class="modal-body" style="height: auto">
                <div class="col-md-6 col-lg-offset-2 ">
                    <div class="panel panel-default">

                        <div class="panel-heading">Do you want to Print Invoice </div>

                        <div class="panel-body">
                            <form class="form-horizontal" action="{{ route('orderinvoice') }}" method="POST"  >
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input id="name" type="hidden" class="form-control" name="order" value="{{$order->id}}"  >
                                    <input id="name" type="hidden" class="form-control" name="user" value="{{$order->user}}"  >


                                    <div class="row">

                                        <div class="col-md-3 col-lg-offset-2">
                                            <button type="submit" class="btn btn-primary">
                                                Yes
                                            </button>

                                        </div>
                                        <div class="col-md-3">
                                            <button data-dismiss="modal" class="btn btn-danger">
                                                No
                                            </button>

                                        </div>


                                    </div>
                                </div>






                            </form>

                        </div>
                    </div>
                </div>



            </div>

        </div>
        <div class="modal fade" id="process{{$order->id}}" tabindex="1"  style="height: auto">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 style="text-decoration-color: white"></h3>

            </div>
            <div class="modal-body" style="height: auto">
                <div class="col-md-6 col-lg-offset-2 ">
                    <div class="panel panel-default">

                        <div class="panel-heading">Do you want to Process this order </div>

                        <div class="panel-body">
                            <form class="form-horizontal" action="{{ route('processorder') }}" method="POST"  >
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input id="name" type="hidden" class="form-control" name="order" value="{{$order->id}}"  >
                                    <input id="name" type="hidden" class="form-control" name="user" value="{{$order->user}}"  >
                                    <input id="name" type="hidden" class="form-control" name="state" value="Delivered"  >


                                    <div class="row">

                                        <div class="col-md-3 col-lg-offset-2">
                                            <button type="submit" class="btn btn-primary">
                                                Yes
                                            </button>

                                        </div>
                                        <div class="col-md-3">
                                            <button data-dismiss="modal" class="btn btn-danger">
                                                No
                                            </button>

                                        </div>


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

