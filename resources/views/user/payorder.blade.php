@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.usersidebar')
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="panel panel-default">
                        <div class="panel-heading">My Cart - {{$id}} </div>

                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>

                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>

                                    <th>Sub Total</th>

                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if(sizeof($cart)>0)


                                    @foreach($cart as $item)
                                        <tr>
                                            <td>{{$item->i_name}}</td>

                                            <td>{{$item->i_qty}}</td>
                                            <td>Rs. {{$item->i_price}}.00</td>
                                            <td>Rs. {{$item->i_price * $item->i_qty}}.00</td>
                                            <td><button type="button" class="btn btn-warning">Remove</button></td>

                                        </tr>
                                       <?php
                                            $total = $total + ($item->i_price * $item->i_qty);
                                        ?>
                                    @endforeach

                                @else
                                    <div class="row">
                                        <h4>Sorry! No items found</h4>
                                    </div>
                                @endif



                                </tbody>
                            </table>
                            <table class="table table-hover">

                                <tbody>

                                <th> Total</th>
                                <th> Rs. {{$total}}.00</th>
                                <th><button type="button" class="btn btn-success">Checkout</button></th>


                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
