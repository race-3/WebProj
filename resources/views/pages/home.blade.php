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
    </style>

</head>
<body>

<div class="jumbotron jumbotron-fluid">
    <div class="container" id="hometitle">Impacts of COVID-19</div>
</div>

<div class="container">
    <div class="row">
        <div class="col-s-12" id="description">
            This is a website dedicated to exploring some of the effects COVID-19 has had on various aspects of life.
            Instead of investigating infection rates, recovery rates, or death rates, we explore other effects and statistics,
            such as changes in the stock market or air quality.
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            Alex copy stuff here
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
    </div>



</div>

</body>
@endsection
