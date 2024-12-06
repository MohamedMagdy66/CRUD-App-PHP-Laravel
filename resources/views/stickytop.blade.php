<!--
<div class="stickybar">
    <nav class="navbar sticky-top navbar-light bg-light">

        <div class="container-fluid">
            <a class="Pname" href="/home">CRUD-APP</a>
        </div>
       
            <div class="authButtons">
                <button class="RgeisterButton" onclick="show()">Register</button>
                <button class="RgeisterButton" onclick="Show()">Login</button>
            </div>
            
    </nav>
</div>-->
<!-- resources/views/layouts/navbar.blade.php or the view containing your navbar -->
<div class="stickybar">
    <nav class="navbar sticky-top navbar-light bg-light">
        <div class="container-fluid">
            <a class="Pname" href="/home">CRUD-APP</a>
        </div>

        @if (Auth::check())
            <!-- User is logged in, so hide the login button -->
            <form action="/Logout" method="POST" class="authButtons">
                @csrf
                <button>Log out</button>
            </form>
        @else
            <div class="authButtons">
                <button class="RgeisterButton" onclick="show()">Register</button>
                <button class="RgeisterButton" onclick="Show()">Login</button>
            </div>
        @endif

    </nav>
</div>
@yield('stickybar')
