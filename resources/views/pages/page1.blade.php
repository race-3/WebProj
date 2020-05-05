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

        * {
            box-sizing: border-box;
        }

        .row > div[class^='col'] {
            padding: 10px;
            border: 1px solid black;
            color: black;
        }

    </style>
</head>

<body>
    <h3 id="title1">Tyler's Page!!!</h3>

    <div class="container">
        <div class="row">
            <div class="col-lg-8" id="item1">
                <img src="https://www.mapquestapi.com/staticmap/v5/map?key=N6KGlsCYB61vGPtH7xR9mbYTNkyvGeHE&center=Portland&size=500,500@2x" alt="Traffic Map" class="img-responsive fit-image"></div>
            <div class="col-lg-4 col-md-6" id="item2">2</div>
        </div>
        <div class="row">
            <div class="col-6 col-md-4" id="item3">3</div>
            <div class="col-6 col-md-4" id="item4">4</div>
            <div class="col-6 col-md-4" id="item5">5</div>
        </div>
    </div>
</body>

<script type="text/javascript">
    fetch('https://swapi.dev/api/planets/')
        .then(res => res.json())
        .then(data => console.log(data))

</script>

@endsection
