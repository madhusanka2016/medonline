@extends('layouts.app')
@section('title', "MedOnline - Products >$Title")
@section('content')
    <div class="container">
        @include('partials.Sidebar')
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="panel panel-default">
                        <div class="panel-heading">Products > {{$Title}} </div>

                        <div class="panel-body">

                            @if(sizeof($items)>0)
                                @foreach(array_chunk($items,4) as $itemschunk)
                                    <div class="row">
                                        @foreach($itemschunk as $item)
                                            <div class="col-sm-6 col-md-3">
                                                <a href="#yesnoModal{{$item->id}}" role="button" data-toggle="modal">
                                                    <div class="thumbnail">

                                                    <div class="caption">

                                                        <td><b>{{$item->i_name}}</b></td>

                                                        <div class="clearfix">
                                                            <div class="pull-left" style="text-decoration-color: red ">
                                                                <img src="{{$item->i_img}}" style="max-width: 120px; max-height: 120px">
                                                            </div>
                                                            <div class="pull-right price" style="text-decoration-color: red ">
                                                                <td><b>Rs. {{$item->i_price}}.00</b></td>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                </a>
                                            </div>
                                            <div class="modal fade" id="yesnoModal{{$item->id}}" tabindex="1"  style="height: auto">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h3 style="text-decoration-color: white"></h3>

                                                </div>
                                                <div class="modal-body" style="height: auto">

                                                    <div class="col-md-8 col-lg-offset-2 ">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">{{$item->i_name}}   </div>

                                                            <div class="panel-body">
                                                                <form class="form-horizontal" method="POST" action="{{ route('addtocart') }}">
                                                                    {{ csrf_field() }}
                                                                    <div class="form-group">
                                                                        <div class="col-md-5 col-md-offset-1">
                                                                            <img src="{{$item->i_img}}" style="width: 300px; height: 300px;">
                                                                        </div>
                                                                        <div class="col-md-5 col-md-offset-0">
                                                                            <div class="form-group">
                                                                                 <div class="col-md-12">
                                                                                    <h3>{{$item->i_name}}</h3>


                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">

                                                                                <div class="col-md-12">
                                                                                    <label for="name" class="control-label">{{$item->i_brand}}</label>

                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">

                                                                                <div class="col-md-12">
                                                                                    <label for="name" class="control-label">Rs. {{$item->i_price}}.00</label>

                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">

                                                                                <div class="col-md-12">
                                                                                    <div class="col-md-4">
                                                                                        <input id="name" type="number" class="form-control" name="qty"  min="1" required autofocus>

                                                                                        <?php
                                                                                        if (isset( Auth::user()->email )) {
                                                                                            echo ' <input id="name" type="hidden" value="'. Auth::user()->email.'" class="form-control" name="user" >
                                                                                      ';
                                                                                        }

                                                                                        ?>


                                                                                         <input id="name" type="hidden" value="{{$item->id}}" class="form-control" name="id" >
                                                                                        <input id="name" type="hidden" value="{{$item->i_name}}" class="form-control" name="name" >
                                                                                        <input id="name" type="hidden" value="{{$item->i_price}}" class="form-control" name="price" >
                                                                                        <input id="name" type="hidden" value="cart" class="form-control" name="state" >
                                                                                        <input id="name" type="hidden" value="{{$Title}}" class="form-control" name="cat" >

                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <button type="submit" class="btn btn-primary">
                                                                                            Add To Cart
                                                                                        </button>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>



                                                                    <div class="form-group">

                                                                        <div class="col-md-6 col-lg-offset-2">
                                                                            <label for="name" class="control-label">{{$item->i_des}}</label>

                                                                        </div>
                                                                    </div>


                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                            </div>

                                        @endforeach
                                    </div>
                                @endforeach

                            @else
                                <div class="row">
                                    <h4> items found</h4>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
