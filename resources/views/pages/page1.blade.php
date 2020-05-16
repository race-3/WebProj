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
        #map {
            height: 500px;
        }

        .container {
            display: grid;
        }

        .row > div[class^='col'] {
            padding: 10px;
            color: black;
        }
        #image {
            position: relative;
            top: 0;
            left: 0;
        }
        #staticmap {
            position: relative;
            top: 0;
            left: 0;
        }
        #traffic {
            position: absolute;
            padding: 10px;
            top: 0;
            left: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <!--<div class="row">
            <div class="col-lg-12" id="map"></div>
        </div>-->
        <div class="row">
            <div class="col-lg-12" id="image">
                <img src="https://www.mapquestapi.com/staticmap/v5/map?key=N6KGlsCYB61vGPtH7xR9mbYTNkyvGeHE&center=45.523064,-122.676483&size=600,300@2x&zoom=11&type=light" alt="Traffic Map" class="img-responsive fit-image" id="staticmap">
                <img src="https://www.mapquestapi.com/traffic/v2/flow?key=N6KGlsCYB61vGPtH7xR9mbYTNkyvGeHE&mapLat=45.523064&mapLng=-122.676483&mapHeight=600&mapWidth=1200&mapScale=108335" id="traffic" alt="Traffic Map" class="img-responsive fit-image">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6" id="barchart">
                <canvas id="barChart"></canvas>
            </div>
            <div class="col-6 col-md-4" id="item5">5</div>
        </div>
    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
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

    var ctx = document.getElementById('barChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

@endsection
