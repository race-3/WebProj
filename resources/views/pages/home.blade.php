@extends('layout.master')

@section('content')

<head>
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        #hometitle {
            text-align: center;
            font-size: 40pt;
        }

        .col-sm-3 {
            text-align: center;
            font-size: 16pt;
            font-weight: 500;
            border: none;
        }

        .timer {
            text-align: center;
        }
    </style>

</head>
<body>

<div class="jumbotron jumbotron-fluid">
    <div class="container" id="hometitle">Impacts of COVID-19</div>
</div>

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-3">
                    <div class="counter extra">
                        <h2 class="timer count-title count-number" data-to="100" data-speed="1500">
                            <div class="count-text ">Location    <i class="fas fa-map-marked-alt"></i></div>
                            <br><div class="title-text"></div>
                            <!-- <i class="fas fa-laptop-house" aria-hidden="true"></i> -->
                        </h2>
                    </div>
                </div>
                <div class="col-3">
                    <div class="counter ">
                        <h2 class="timer count-title count-number" data-to="1700" data-speed="1500">
                            <div class="count-text ">Cases    <i class="fa fa-medkit icon" aria-hidden="true"></i></div>
                            <br><div class="title-text"></div>
                        </h2>

                    </div>
                </div>
                <div class="col-3">
                    <div class="counter">
                        <h2 class="timer count-title count-number" data-to="11900" data-speed="1500">
                            <div class="count-text ">Deaths    <i class="fas fa-skull-crossbones icon"></i></div>
                            <br><div class="title-text"></div>
                        </h2>

                    </div>
                </div>
                <div class="col-3">
                    <div class="counter extra">
                        <h2 class="timer count-title count-number" data-to="157" data-speed="1500">
                            <div class="title-text"></div>
                            <br><p class="count-text "></p>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3" id="description">
            <br><br>Heath Organizations:
            <br><a href="https://www.cdc.gov/coronavirus/2019-nCoV/index.html">CDC</a>
            <br><a href="https://govstatus.egov.com/OR-OHA-COVID-19">Oregon Health Authority</a>
        </div>
        <div class="col-sm-3" id="newsUpdates">
        <br><br>News Updates:
            <br><a href="https://www.google.com/search?q=coronavirus&rlz=1C1SQJL_enUS790US790&source
                =lnms&tbm=nws&sa=X&ved=2ahUKEwigqvbvzcXpAhWJpZ4KHbdzDbIQ_AUoAXoECCIQAw&biw=1707&bih=838&dpr=1.13">News Updates</a>
            <br><a href="https://www.google.com/search?q=coronavirus+vaccine&rlz=1C1SQJL_enUS790US790&source=lnms&tbm=
                nws&sa=X&ved=2ahUKEwjCm_3N9ePpAhXI7Z4KHVX-BgQQ_AUoAXoECAwQAw&biw=1707&bih=838&dpr=1.13">Vaccine Updates</a>
        </div>
        <div class="col-sm-3" id="testingInfo">
        <br><br>Testing Information:
            <br><a href="https://sharedsystems.dhsoha.state.or.us/DHSForms/Served/le2279a.pdf">Information on Testing (Local)</a>
            <br><a href="https://www.google.com/maps/search/coronavirus+testing/@45.4991224,-122.7832994,12z">Testing Sites in the Portland area</a>
        </div>
        <div class="col-sm-3" id="stats">
            <br><br>Statistics:
            <br><a href="https://www.worldometers.info/coronavirus/">Statistics (Worldwide)</a>
            <br><a href="https://www.worldometers.info/coronavirus/country/us/">Statistics (USA)</a>
        </div>
        </div>

    <br><div class="row">
        <div class="col-s-12" id="description">
            This is a website dedicated to exploring some of the effects COVID-19 has had on various aspects of life.
            Instead of investigating infection rates, recovery rates, or death rates, we explore other effects and statistics,
            such as changes in the stock market or air quality.
        </div>
    </div>

</div>

</body>

<script type="text/javascript">
    $(function(){
        getStateData();
    });

    function getStateData(){
        var data = $.getJSON("https://finnhub.io/api/v1/covid19/us?token=br3gesfrh5rai6tghlig",
            function(dat){
                $($(".title-text")[0]).text(dat[29]["state"]);
                $($(".title-text")[1]).text(dat[29]["case"]);
                $($(".title-text")[2]).text(dat[29]["death"]);
                $($(".title-text")[3]).text(dat[29]["updated"].split(" ")[0]);
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
            $($(".title-text")[0]).text(data[x]["state"]);
            $($(".title-text")[1]).text(data[x]["case"]);
            $($(".title-text")[2]).text(data[x]["death"]);
            $($(".title-text")[3]).text(dateTime[0]);
            $(".count-text").last().text(dateTime[1]);
        },10000);
    }
</script>
@endsection
