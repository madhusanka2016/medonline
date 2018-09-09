@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.adminsidebar')
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="panel panel-default">
                        <div class="panel-heading">Recent Orders </div>

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
                </div>
            </div>
        </div>

    </div>

@endsection
