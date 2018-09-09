@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.cashiersidebar')
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="panel panel-default">
                        <div class="panel-heading">Upcomming Orders </div>

                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>

                                    <th>Order Id</th>
                                    <th>Price</th>
                                    <th>State</th>


                                    <th>View</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if(sizeof($orders)>0)


                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order->orderid}}</td>
                                            <td>{{$order->price}}</td>
                                            <td>{{$order->state}}</td>

                                            <td><a href="/vieworders/{{$order->orderid}}"  ><button type="button" class="btn btn-warning">View</button></a></td>

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

                    <div class="panel panel-default">
                        <div class="panel-heading">Items </div>

                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>

                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Price</th>
                                    <th>Quantity</th>


                                </tr>
                                </thead>
                                <tbody>
                                @if(sizeof($items)>0)


                                    @foreach($items as $item)
                                        <tr>
                                            <td>{{$item->i_name}}</td>
                                            <td>{{$item->i_cat}}</td>
                                            <td>{{$item->i_brand}}</td>
                                            <td>{{$item->i_price}}</td>
                                            <td>{{$item->i_qty}}</td>

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
                    <div class="panel panel-default">
                        <div class="panel-heading">Upcomming Prescriptions </div>

                        <div class="panel-body">



                        </div>

                    </div>
                </div>
                </div>
            </div>
        </div>

    </div>

@endsection
