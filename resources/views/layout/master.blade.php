<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
    #title {
        font-size: x-large;
    }
    .active {
        color: red;
    }
</style>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route("home") }}" id="title">Covid-19 Stats</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="{{ Request::is('page1') ? 'active' : '' }}"><a class="nav-link" href="{{ route("page1") }}">Tyler</a></li>
            <li class="{{ Request::is('page2') ? 'active' : '' }}"><a class="nav-link" href="{{ route("page2") }}">Alex</a></li>
            <li class="{{ Request::is('page3') ? 'active' : '' }}"><a class="nav-link" href="{{ route("page3") }}">Kareem</a></li>
            <li><a class="nav-link"     href="#">Page 4</a></li>
        </ul>
    </div>
</nav>

@yield('content')

</html>
