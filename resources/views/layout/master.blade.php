<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

<style>
    #title {
        font-size: x-large;
    }

    #nav-item-btn {
        position: absolute;
        float: right;
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
                <li class="{{ Request::is('environment') ? 'active' : '' }}"><a class="nav-link" href="{{ route("environment") }}">Environmental Effects</a></li>
            </li>
            <li class="nav-item">
                <li class="{{ Request::is('page2') ? 'active' : '' }}"><a class="nav-link" href="{{ route("page2") }}">Stock Market Effects</a></li>
            </li>
            <li class="nav-item">
                <li class="{{ Request::is('page3') ? 'active' : '' }}"><a class="nav-link" href="{{ route("page3") }}">Economic Effects</a></li>
            </li>
            <li class="nav-item-btn">
                <!-- <button onclick="location.href = '{{route("page3")}}'" id="myButton" class="float-left submit-button" >Home</button>
                    <button onclick="location.href = '{{route("page3")}}'" id="myButton" class="float-left submit-button" >Home</button>
                -->
            </li>
        </ul>
    </div>


</nav>

@yield('content')

</html>
