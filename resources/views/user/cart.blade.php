@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.usersidebar')
        @if(sizeof($cart)>0)


            @foreach($cart as $item)

                <div class="modal fade" id="remove{{$item->id}}" tabindex="1"  style="height: auto">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 style="text-decoration-color: white"></h3>

                    </div>
                    <div class="modal-body" style="height: auto">
                        <div class="col-md-6 col-lg-offset-2 ">
                            <div class="panel panel-default">

                                <div class="panel-heading">Do you want to Delete this Item </div>

                                <div class="panel-body">
                                    <form class="form-horizontal" action="{{ route('deletecart') }}" method="POST"  >
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input id="name" type="hidden" class="form-control" name="item" value="{{$item->id}}"  >
                                            <input id="name" type="hidden" class="form-control" name="user" value="{{ Auth::user()->email }}"  >


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

        @endif
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
                                            <td><a href="#remove{{$item->id}}"  data-toggle="modal"><button type="button" class="btn btn-warning">Remove</button></a></td>


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
                                <th><a href="#checkout"  data-toggle="modal"><button type="button" class="btn btn-success">Checkout</button></a></th>


                            </table>
                            <div class="modal fade" id="checkout" tabindex="1"  style="height: auto">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h3 style="text-decoration-color: white"></h3>

                                </div>
                                <div class="modal-body" style="height: auto">
                                    <div class="col-md-6 col-lg-offset-2 ">
                                        <div class="panel panel-default">

                                            <div class="panel-heading">Do you want to Checkout this order? </div>

                                            <div class="panel-body">
                                                <form class="form-horizontal" method="POST" action="{{ route('purchase') }}" >
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <label for="name" class="col-md-4 control-label">Total Price</label>

                                                        <div class="col-md-6">
                                                            <label for="name" class="col-md-4 control-label">Rs. {{$total}}.00</label>

                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="col-md-4 control-label">Select Payment Method</label>

                                                        <div class="col-md-6" >
                                                            <select name="pay" class="form-control">
                                                                @if(sizeof($payment)>0)


                                                                    @foreach($payment as $pay)
                                                                        <option value="{{$pay->id}}">{{$pay->card}} - {{$pay->type}}</option>

                                                                    @endforeach

                                                                @else
                                                                    <option value="0">No Payment Method Added</option>
                                                                @endif


                                                            </select>


                                                        </div>
                                                    </div>





                                                    <div class="form-group">
                                                        <div class="col-md-6 col-md-offset-4">
                                                            <button type="submit" class="btn btn-primary">
                                                                Confirm Order
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <input id="name" type="hidden" class="form-control" name="user" value="{{ Auth::user()->email }}"  >
                                                        @if(sizeof($order)>0)


                                                            @foreach($order as $idnew)

                                                                <?php
                                                                $ordernew =  $idnew->orderid;
                                                                ?>
                                                            @endforeach

                                                        @else
                                                            <div class="row">
                                                                <h4>Sorry! No items found</h4>
                                                            </div>
                                                        @endif
                                                        <?php
                                                        $ordernew =  $ordernew+1;
                                                        ?>
                                                        <input id="name" type="hidden" class="form-control" name="order" value="{{$ordernew}}"  >
                                                        <input id="name" type="hidden" class="form-control" name="price" value="{{$total}}"  >
                                                        <input id="name" type="hidden" class="form-control" name="state" value="Processing"  >



                                                    </div>






                                                </form>

                                            </div>
                                        </div>
                                    </div>



                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
