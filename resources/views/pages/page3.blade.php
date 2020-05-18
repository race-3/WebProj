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

            #headerTitle {
                text-align: center;
                padding: 3px;
                font-weight: 700;
            }

            #subtitle {
                color: gray;
            }

            #footnote {
                color: lightslategray;
                font-style: italic;
            }

            #mainContainer {
                margin-left: 50px;
                margin-right: 50px;
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

        <div class="container-fluid" id="mainContainer">
            <div class="row">
                <div class="col-md-12">
                    <div id="item1">
                        <h3>About this Data</h3>
                        <p>This data uses charts that gather data from between X years to present. As such, not all of it is relevant to the ongoing coronavirus pandemic. As such, there will be statistical information listed as such:</p>
                        <p><b>Pre-Coronavirus</b>: Anything prior to January 2020, when the first case was confirmed in the United States</p>
                        <p><b>During the pandemic</b>: Anything from January 2020 onward</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div id="item2">
                        <h4 id="headerTitle">US Unemployment Rate, April 2019 - April 2020</h4>
                        <iframe src='https://d3fy651gv2fhd3.cloudfront.net/embed/?s=usurtot&v=202005081237V20191105&d1=20190519&h=300&w=600' height='300px' width='100%'  frameborder='0' scrolling='no'></iframe>
                        <br />
                        <h4 id="subtitle">Average Change Per Year</h4>
                        <p><b>Pre-Coronavirus</b>: 6.67% per month</p>
                        <p><b>During the pandemic</b>: 36% per month</p>
                        <h4 id="footnote">Average is defined as the change month over month divided by the total number of months. This is focused on the <b>change</b>, not the direction of the change. For "During the pandemic", the greatest change is between March and April, where unemployment jumps over 330%</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div id="item3">
                        <h4 id="headerTitle">US Wage Growth, April 2019 - April 2020</h4>
                        <iframe src='https://tradingeconomics.com/embed/?s=unitedstawaggro&v=202004301856v20191105&h=300&w=600&ref=/united-states/wage-growth' height='300' width='100%'  frameborder='0' scrolling='no'></iframe>
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
