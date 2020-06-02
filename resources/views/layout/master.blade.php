<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<script type="text/javascript">
    $(function(){
        getStateData();
    });

    function getStateData(){
      var data = $.getJSON("https://finnhub.io/api/v1/covid19/us?token=br3gesfrh5rai6tghlig",
        function(dat){
            $($(".count-number")[0]).text(dat[29]["state"]);
            $($(".count-number")[1]).text(dat[29]["case"]);
            $($(".count-number")[2]).text(dat[29]["death"]);
            $($(".count-number")[3]).text(dat[29]["updated"].split(" ")[0]);
            $(".count-text").last().text(dat[29]["updated"].split(" ")[1]);
            displayStates(dat);
        }
      );
      return data;
    }

    function displayStates(data){
        var x;
        setInterval(function(){
            x = Math.floor((Math.random() * data.length));
            dateTime = data[x]["updated"].split(" ");
            $($(".count-number")[0]).text(data[x]["state"]);
            $($(".count-number")[1]).text(data[x]["case"]);
            $($(".count-number")[2]).text(data[x]["death"]);
            $($(".count-number")[3]).text(dateTime[0]);
            $(".count-text").last().text(dateTime[1]);
        },10000);
    }
</script>
<style>
    #title {
        font-size: x-large;
    }

    #nav-item-btn {
        position: absolute;
        float: right;
    }
    .corner{
        float: right;
    }
    .counter{
        width: 50px;
        max-width: 100px;
    }
    .less{
        right: -100px;
    }
    .extra{
        max-width: 200px;
        width: 200px;
        margin-right: 100px;
    }
    .count-number.count-title {
        font-size:24px;
    }
    .count-text{
        font-size: 12px;
    }
    @media only screen and (max-width: 990px) {
        .count-number.count-title {
            font-size:12px;
        }
        .count-text{
            font-size: 6px;
        }
        .counter{
            max-width: 10px;
        }
        .extra{
            max-width: 20px;
            width: 20px;
            margin-right: 10px;
        }
    }
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

    <div class="corner" >
      <div class="container">
        <section id="our-stats">
            <div class="row text-center">
                <div class="col">
                    <div class="counter extra">
                        <h2 class="timer count-title count-number" data-to="100" data-speed="1500">0</h2>
                    </div>
                </div>
                <div class="col less">
                    <div class="counter row">
                        <h2 class="timer count-title count-number" data-to="1700" data-speed="1500">0</h2>
                        <i class="fa fa-medkit" aria-hidden="true"></i>
                        <div class="count-text ">Cases</div>
                    </div>
                </div>
                <div class="col less">
                    <div class="counter row">
                        <h2 class="timer count-title count-number" data-to="11900" data-speed="1500">0</h2>
                        <i class="fas fa-skull-crossbones"></i>
                        <div class="count-text ">Deaths</div>
                    </div>
                </div>
                <div class="col">
                    <div class="counter extra">
                        <h2 class="timer count-title count-number" data-to="157" data-speed="1500">0</h2>
                        <p class="count-text "></p>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>
</nav>

@yield('content')

</html>
