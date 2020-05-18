@extends('layout.master')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            #title1 {
                color: black;
                text-align: center;
                padding: 10px;
                border-bottom: 1px solid gray;
            }

            [id*='item'] {
                border-radius: 8px;
                border: 1px solid black;
                padding: 10px;
                -webkit-box-shadow: 0 8px 6px -6px black;
                -moz-box-shadow: 0 8px 6px -6px black;
                box-shadow: 0 8px 6px -6px black;
                margin-top: 20px;
            }

        </style>
    </head>
    <body>
        <h3 id="title1">Economic Impacts of COVID-19</h3>

        <div class="container" id="mainContainer">
            <div class="row">
                <div class="col-md-30">
                    <div id="item1">
                        <h3>Stuff</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit... stuff stuff stuff stuff stuff stuff more stuff stuff</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4>US Unemployment Rate, April 2019 - April 2020</h4>
                    <iframe src='https://d3fy651gv2fhd3.cloudfront.net/embed/?s=usurtot&v=202005081237V20191105&d1=20190519&h=300&w=600' height='300' width='600'  frameborder='0' scrolling='no'></iframe>
                    <br />
                </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">




        </script>


            </body>
</html>
@endsection
