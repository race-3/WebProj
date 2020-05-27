<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

<style>
    #title {
        font-size: x-large;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route("home") }}" id="title">Covid-19 Stats</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <li class="{{ Request::is('page1') ? 'active' : '' }}"><a class="nav-link" href="{{ route("page1") }}">Tyler</a></li>
            </li>
            <li class="nav-item">
                <li class="{{ Request::is('page2') ? 'active' : '' }}"><a class="nav-link" href="{{ route("page2") }}">Alex</a></li>
            </li>
            <li class="nav-item">
                <li class="{{ Request::is('page3') ? 'active' : '' }}"><a class="nav-link" href="{{ route("page3") }}">Kareem</a></li>
            </li>
        </ul>
    </div>
</nav>

@yield('content')

</html>
