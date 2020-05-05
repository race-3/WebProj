@extends('layout.master')

@section('content')

<head>
    <script type="text/javascript">
        var req = new XMLHttpRequest();
        var URLhost = 'https://swapi.dev/api/planets/';
        var response;

        req.open('GET', URLhost, true);
        req.addEventListener('load',function(){
            if(req.status >= 200 && req.status < 400){
                response = JSON.parse(req.responseText);
                console.log(response);
            } else {
                console.log('Error in network request: ' + req.statusText);
            }
        });

        //response.results[0].name;
    </script>

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

        #item1 {
            height: 500px;
        }

    </style>
</head>

<body>
    <h3 id="title1">Tyler's Page!!!</h3>

    <div class="container">
        <div class="row">
            <div class="col-lg-8" id="item1">1</div>
            <div class="col-lg-4 col-md-6" id="item2">2</div>
        </div>
        <div class="row">
            <div class="col-6 col-md-4" id="item3">3</div>
            <div class="col-6 col-md-4" id="item4">4</div>
            <div class="col-6 col-md-4" id="item5">5</div>
        </div>
    </div>
</body>

@endsection
