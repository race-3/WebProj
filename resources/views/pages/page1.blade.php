@extends('layout.master')

@section('content')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        #title1 {
            color: blue;
        }

        .container {
            display: grid;
        }

        .row > div[class^='col'] {
            padding: 10px;
            border: 1px solid black;
            color: black;
        }


        #traffic {
            position: absolute;
            padding: 10px;
            top: 0;
            left: 0;
            opacity: 0.7;
        }

    </style>
</head>

<body>
    <h3 id="title1">Tyler's Page!!!</h3>

    <div class="container">
        <div class="row">
            <div class="col-lg-6" id="map" style="width: 500px; height: 500px"></div>
            <div class="col-lg-4 col-md-6" id="item2">2</div>
        </div>
        <div class="row">
            <div class="col-6 col-md-4" id="item3">3</div>
            <div class="col-6 col-md-4" id="item4">4</div>
            <div class="col-6 col-md-4" id="item5">5</div>
        </div>
    </div>
</body>

<script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js"></script>
<link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css"/>

<script type="text/javascript">
    window.onload = function() {
        L.mapquest.key = 'N6KGlsCYB61vGPtH7xR9mbYTNkyvGeHE';

        var map = L.mapquest.map('map', {
            center: [45.523064, -122.676483],
            layers: L.mapquest.tileLayer('map'),
            zoom: 12
        });

        map.addLayer(L.mapquest.trafficLayer());
    }
</script>

@endsection
