<nav class="col-md-3" >
    <div class="panel panel-default" style="padding: 0px;">
        <div class="panel-heading">Your Profile</div>

        <div class="panel-body">
    <ul class="nav nav-pills nav-stacked" data-offset-top="205">


        <li class="dropdown pad13">
            <a href="/profile/{{ Auth::user()->email }}">My Details </a>

        </li>
        <li class="dropdown pad13">
            <a href="/shoppingcart/{{ Auth::user()->email }}">My Cart </a>

        </li>
        <li class="dropdown pad13">
            <a href="/myorders/{{ Auth::user()->email }}">My Orders </a>

        </li>
        <li class="dropdown pad13">
            <a href="/mypayments/{{ Auth::user()->email }}">My Payment Method </a>

        </li>
        <li class="dropdown pad13">
            <a href="/myprescriptions/{{ Auth::user()->email }}">My Prescriptions </a>

        </li>

        <hr>


    </ul>
        </div>
    </div>

</nav>

<!-- This div is not closed and this will be closed on the relevent page this partial item goes -->
