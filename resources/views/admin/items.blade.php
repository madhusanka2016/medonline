@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.adminsidebar')
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="panel panel-default">
                        <div class="panel-heading">Items ---------------------------------------------------<a href="{{ url('/add') }}"> <button type="button" class="btn btn-success">Add Item</button> </a></div>

                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>

                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Add Quantity</th>
                                    <th>Change</th>
                                    <th>Delete</th>
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
                                            <td><a href="#add{{$item->id}}" role="button" data-toggle="modal"><button type="button" class="btn btn-default">Add</button></a></td>
                                            <td><a href="#change{{$item->id}}" role="button" data-toggle="modal"><button type="button" class="btn btn-standard">Change</button></a></td>

                                            <td><a href="#remove{{$item->id}}" role="button" data-toggle="modal"><button type="button" class="btn btn-danger">Delete</button></a></td>


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
@if(sizeof($items)>0)


    @foreach($items as $item)

        <div class="modal fade" id="add{{$item->id}}" tabindex="1"  style="height: auto">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 style="text-decoration-color: white"></h3>

            </div>
            <div class="modal-body" style="height: auto">
                <div class="col-md-6 col-lg-offset-2 ">
                    <div class="panel panel-default">

                        <div class="panel-heading">Add New Quantity for {{$item->i_name}}</div>

                        <div class="panel-body">
                            <form class="form-horizontal" action="{{ route('addqty') }}" method="POST"  >
                                {{ csrf_field() }}



                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label col-lg-offset-0">Add Quantity</label>
                                    <div class="col-md-6">

                                        <div class="col-md-4">
                                            <input id="name" type="number" class="form-control" name="qty"  min="1" required autofocus>
                                        </div>
                                    </div>
                                </div>


                                            <div class="form-group">
                                                    <input id="name" type="hidden" class="form-control" name="item" value="{{$item->id}}"  >
                                                <input id="name" type="hidden" class="form-control" name="stock" value="{{$item->i_qty}}"  >



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

        <div class="modal fade" id="change{{$item->id}}" tabindex="1"  style="height: auto">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 style="text-decoration-color: white"></h3>

            </div>
            <div class="modal-body" style="height: auto">
                <div class="col-md-6 col-lg-offset-2 ">
                    <div class="panel panel-default">

                        <div class="panel-heading">Change Item {{$item->i_name}}</div>

                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ route('changeitem') }}">
                                {{ csrf_field() }}
                                <input id="name" type="hidden" class="form-control" name="id" value="{{$item->id}}"  >
                                <input id="name" type="hidden" class="form-control" name="qty" value="{{$item->i_qty}}"  >
                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Item Name</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{$item->i_name}}"  required autofocus>


                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Item Category</label>

                                    <div class="col-md-6" >
                                        <select name="cat" class="form-control">
                                            <option value="1">Prescription Medicine</option>
                                            <option value="2">Diabetes</option>
                                            <option value="3">Home Medicine</option>
                                            <option value="4">First Aid</option>
                                            <option value="5">Mother & Baby</option>
                                            <option value="6">Wellness</option>
                                            <option value="7">Personal Care</option>
                                            <option value="8">Skin Care</option>
                                            <option value="9">Health Care</option>
                                            <option value="10">Pet Care</option>
                                            <option value="11">Supplements</option>
                                        </select>


                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Item Brand</label>

                                    <div class="col-md-6">
                                        <input id="name" type="textarea" class="form-control" name="brand" value="{{$item->i_brand}}" required autofocus>


                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Item Description</label>

                                    <div class="col-md-6">
                                        <input id="name" type="textarea" class="form-control" name="desc" value="{{$item->i_des}}" required autofocus>


                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Item Price</label>

                                    <div class="col-md-6">
                                        <input id="name" type="number" class="form-control" name="price" value="{{$item->i_price}}"  required autofocus>


                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Image Link</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="img" value="{{$item->i_img}}" required autofocus>


                                    </div>
                                </div>




                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Change
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>



            </div>

        </div>
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
                            <form class="form-horizontal" action="{{ route('deleteitem') }}" method="POST"  >
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
    <div class="row">
        <h4>Sorry! No items found</h4>
    </div>
@endif

