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
        #hometitle {
            text-align: center;
            font-size: 40pt;
        }
        #description {
            font-size: 16pt;
        }
    </style>

</head>
<body>

<div class="jumbotron jumbotron-fluid">
    <div class="container" id="hometitle">Impacts of COVID-19</div>
</div>

<div class="container">
    <div class="col-s-12" id="description">
        This is a website dedicated to exploring some of the effects COVID-19 have contributed to.
        Instead of infection or death rates, we explore other effects, such as changes in the stock market or air quality.
    </div>
</div>

</body>
@endsection
