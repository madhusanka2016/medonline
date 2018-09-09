<nav class="navbar navbar-default" style="box-shadow: 0px 0px 10px rgba(0,0,0,0.5)">
    <div class="container-fluid">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="/">MED ONLINE</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;<li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/"><img
                                src="{{ asset('img/home/home.png')}}"
                                style="width:20px;height: 20px; position: relative; top: -5px "> Home <span
                                class="sr-only">(current)</span></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{ asset('img/home/acc.png')}}"
                                                                                    style="width:20px;height: 20px; position: relative; top: -5px ">
                        Products <span
                                class="caret"></span></a>
                    <ul class="dropdown-menu multi-column columns-3">
                        <div class="row">
                            <div class="col-sm-4">
                                <ul class="multi-column-dropdown">
                                    <li><a href="{{ url('/Prescription Medicine') }}">Prescription Medicine</a></li>
                                    <li><a href="{{ url('/Diabetes') }}">Diabetes</a></li>
                                    <li><a href="{{ url('/Home Medicine') }}">Home Medicine</a></li>
                                    <li><a href="{{ url('/First Aid') }}">First Aid</a></li>


                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <ul class="multi-column-dropdown">
                                    <li><a href="{{ url('/Mother & Baby') }}">Mother & Baby</a></li>
                                    <li><a href="{{ url('/Wellness') }}">Wellness</a></li>
                                    <li><a href="{{ url('/Personal Care') }}">Personal Care</a></li>
                                    <li><a href="{{ url('/Skin Care') }}">Skin Care</a></li>

                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <ul class="multi-column-dropdown">
                                    <li><a href="{{ url('/Health Care') }}">Health Care</a></li>
                                    <li><a href="{{ url('/Pet Care') }}">Pet Care</a></li>
                                    <li><a href="{{ url('/Supplements') }}">Supplements</a></li>

                                </ul>
                            </div>
                        </div>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img
                                src="{{ asset('img/home/services.png')}}"
                                style="width:20px;height: 20px; position: relative; top: -5px "> Our Services <span
                                class="caret"></span></a>
                    <ul class="dropdown-menu multi-column columns-2">
                        <div class="row">
                            <div class="col-sm-8">
                                <ul class="multi-column-dropdown">
                                    <li><a href="#"><b>Online Shopping</b></a></li>
                                    <li><a href="#"><b>Online Prescription</b></a></li>
                                    <li><a href="#"><b>Sheduleds Prescriptions</b></a></li>
                                    <li><a href="#"><b>Doctor Channeling</b></a></li>

                                </ul>
                            </div>

                        </div>
                    </ul>
                </li>
                <li><a href="/"><img src="{{ asset('img/home/About.png')}}"
                                     style="width:20px;height: 20px; position: relative; top: -5px "> About Us </a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <li><a href="">
                        <button type="button" class="btn btn-primary">Upload Your Prescription</button>
                    </a>
                </li>

                <!-- Authentication Links -->
                @guest

                <li><a href="{{ route('login') }}">
                        <button type="button" class="btn btn-danger">Login</button>
                    </a>
                </li>
                <li><a href="{{ route('register') }}">
                        <button type="button" class="btn btn-success">Register Now</button>
                    </a>
                </li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                            <?php
                            if (isset( Auth::user()->email )) {
                                if (Auth::user()->email=="admin@admin.com"){
                                    echo '  <li><a href="/admin">
                                    <button type="button" class="btn btn-success">Admin View</button>
                                </a>
                            </li>';
                                }
                               elseif (Auth::user()->email=="cashier@cashier.com"){
                                   echo '  <li><a href="/cashier">
                                    <button type="button" class="btn btn-success">Cashier View</button>
                                </a>
                            </li>';
                               }


                            }

                            ?>
                            <li><a href="/profile/{{ Auth::user()->email }}">
                                    <button type="button" class="btn btn-success">Profile</button>
                                </a>
                            </li>

                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <button type="button" class="btn btn-danger">LogOut</button>
                                </a>
                            </li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                            </li>
                        </ul>
                    </li>
                    @endguest
            </ul>
        </div>
    </div>
</nav>