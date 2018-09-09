@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.adminsidebar')
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="panel panel-default">
                        <div class="panel-heading">Add Item </div>

                        <div class="panel-body">

                            <form class="form-horizontal" method="POST" action="{{ route('additemdb') }}">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Item Name</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name"  required autofocus>


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
                                        <input id="name" type="textarea" class="form-control" name="brand"  required autofocus>


                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Item Description</label>

                                    <div class="col-md-6">
                                        <input id="name" type="textarea" class="form-control" name="desc"  required autofocus>


                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Item Price</label>

                                    <div class="col-md-6">
                                        <input id="name" type="number" class="form-control" name="price"  required autofocus>


                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Initial Quantity</label>

                                    <div class="col-md-6">
                                        <input id="name" type="number" class="form-control" name="qty"  required autofocus>


                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Image Link</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="img"  required autofocus>


                                    </div>
                                </div>




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

    </div>

@endsection
