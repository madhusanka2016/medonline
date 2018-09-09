@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.cashiersidebar')
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="panel panel-default">

                        @if(sizeof($pres)>0)


                            @foreach($pres as $item)
                                <div class="panel-heading">View Prescriptions - Order Id - {{$item->id}}  -  {{$item->topic}}  </div>

                                <div class="panel-body">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>

                                            <th>User</th>
                                            <th>Repeat</th>
                                            <th>State</th>

                                            <th>Total Price</th>

                                            <th>Check Out</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $total =0;
                                        ?>
                                        @if(sizeof($bucket)>0)


                                            @foreach($bucket as $item)

                                                <?php
                                                $total = $total + ($item->i_price * $item->i_qty);
                                                ?>
                                            @endforeach

                                        @else
                                            <div class="row">
                                                <h4>Sorry! No items found</h4>
                                            </div>
                                        @endif

                                        @if(sizeof($pres)>0)


                                            @foreach($pres as $item)
                                                <tr>
                                                    <td>{{$item->user}}</td>

                                                    <td>{{$item->repeat}}</td>
                                                    <td> {{$item->state}}</td>

                                                    <td>Rs. {{$total}}.00</td>
                                                    <td><a href="#viewpresc{{$item->id}}"  data-toggle="modal"><button type="button" class="btn btn-warning">Check Out</button></a></td>

                                                </tr>
                                                <div class="modal fade" id="viewpresc{{$item->id}}" tabindex="1"  style="height: auto">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h3 style="text-decoration-color: white"></h3>

                                                    </div>
                                                    <div class="modal-body" style="height: auto">
                                                        <div class="col-md-6 col-lg-offset-2 ">
                                                            <div class="panel panel-default">

                                                                <div class="panel-heading">Do you want to Checkout this order? </div>

                                                                <div class="panel-body">
                                                                    <form class="form-horizontal" method="POST" action="{{ route('processprec') }}">
                                                                        {{ csrf_field() }}
                                                                        <div class="form-group">
                                                                            <input id="name" type="hidden" class="form-control" name="order" value="{{$item->id}}"  >
                                                                            <input id="name" type="hidden" class="form-control" name="price" value="{{$total}}"  >
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



                                        </tbody>
                                    </table>
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>

                                            <th>Descrioption</th>



                                            <th>Link</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        @if(sizeof($pres)>0)


                                            @foreach($pres as $item)
                                                <tr>
                                                    <td>{{$item->desc}}</td>



                                                    <td><a href="{{$item->link}}"  target="_blank">View Prescription Image</a> </td>


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
                            @endforeach

                        @else
                            <div class="row">
                                <h4>Sorry! No items found</h4>
                            </div>
                        @endif



                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 ">
                    <div class="panel panel-default">
                        <div class="panel-heading"> Bucket </div>

                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>

                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Net Price</th>

                                    <th>Remove</th>


                                </tr>
                                </thead>
                                <tbody>

                                @if(sizeof($bucket)>0)


                                    @foreach($bucket as $item)
                                        <tr>
                                            <td>{{$item->i_name}}</td>
                                            <td>{{$item->i_qty}}</td>
                                            <td>{{$item->i_price}}</td>
                                            <td>{{$item->i_price * $item->i_qty}}</td>

                                            <td><a href="#viewpresc{{$item->id}}"  data-toggle="modal"><button type="button" class="btn btn-warning">Remove</button></a></td>

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
                <div class="col-md-6 ">
                    <div class="panel panel-default">
                        <div class="panel-heading"> Medicines </div>

                        <div class="panel-body">


                                @if(sizeof($med)>0)


                                    @foreach($med as $item)





                                                <form id="{{$item->id}}" class="form-horizontal" method="POST" action="{{ route('addtopresc') }}">
                                                    <table >



                                                    <tr>
                                                        {{ csrf_field() }}
                                                    <td style="min-width: 200px">{{$item->i_name}}</td>
                                                <td> <input id="name" type="number" class="form-control" style="width: 75px" name="qty"   size="3" min="1" required autofocus></td>

                                                <input id="name" type="hidden" value="{{$item->id}}" class="form-control" name="i_id" >
                                                <input id="name" type="hidden" value="{{$id}}" class="form-control" name="orderid" >
                                                <input id="name" type="hidden" value="{{$item->i_name}}" class="form-control" name="name" >
                                                <input id="name" type="hidden" value="{{$item->i_price}}" class="form-control" name="price" >
                                                <input id="name" type="hidden" value="{{Auth::user()->email}} " class="form-control" name="user" >


                                                <td><button type="submit" class="btn btn-primary">
                                                        Add
                                                    </button>

                                                </td>
                                                    </tr>
                                                    </table>
                                                </form>




                                    @endforeach

                                @else
                                    <div class="row">
                                        <h4>Sorry! No items found</h4>
                                    </div>
                                @endif





                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@if(sizeof($pres)>0)


    @foreach($pres as $item)

        <div class="modal fade" id="viewpresc{{$item->id}}" tabindex="1"  style="height: auto">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 style="text-decoration-color: white"></h3>

            </div>
            <div class="modal-body" style="height: auto">
                <div class="col-md-6 col-lg-offset-2 ">
                    <div class="panel panel-default">

                        <div class="panel-heading">Do you want to Checkout this order? </div>

                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ route('processprec') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input id="name" type="hidden" class="form-control" name="order" value="{{$item->id}}"  >
                                    <input id="name" type="hidden" class="form-control" name="price" value="{{$total}}"  >
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


@endif
