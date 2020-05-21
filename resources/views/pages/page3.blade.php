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
                font-weight: 700;
            }

            #title-footnote {
                text-align: center;
                padding: 3px;
                font-style: italic;
                color: darkgray;
            }

            #headerTitle {
                text-align: center;
                padding: 3px;
                font-weight: 700;
            }

            #sectionTitle {
                text-align: center;
                padding-top: 10px;
                padding-bottom: 5px;
                font-weight: 700;
                color: darkgray;
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

            .switch {
                position: relative;
                display: inline-block;
                width: 60px;
                height: 34px;
            }

            .switch input {
                opacity: 0;
                width: 0;
                height: 0;
            }

            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #ccc;
                -webkit-transition: .4s;
                transition: .4s;
            }

            .slider:before {
                position: absolute;
                content: "";
                height: 26px;
                width: 26px;
                left: 4px;
                bottom: 4px;
                background-color: white;
                -webkit-transition: .4s;
                transition: .4s;
            }

            input:checked + .slider {
                background-color: #DC143C;
            }

            input:focus + .slider {
                box-shadow: 0 0 1px #DC143C;
            }

            input:checked + .slider:before {
                -webkit-transform: translateX(26px);
                -ms-transform: translateX(26px);
                transform: translateX(26px);
            }

            .slider.round {
                border-radius: 35px;
            }

            .slider.round:before {
                border-radius: 50%;
            }

            .darkmode {
                background-color: #404040;
                color: #E0E0E0;
            }

        </style>
    </head>

    <body>
        <h3 id="title1">Economic Impacts of COVID-19</h3>
        <h4 id="title-footnote">Non-stock market related economic changes since the start of the coronavirus pandemic</h4><hr color="'darkgray">
        <label class="switch">
            <input type="checkbox" onclick="darkmode()">
            <span class="slider round"></span>
        </label>
        <div class="container-fluid" id="mainContainer">
            <div class="row">
                <div class="col-md-12">
                    <div id="item1">
                        <h3>About this Data</h3>
                        <p>This data uses charts that gather data from between X years to present. As such, not all of it is relevant to the ongoing coronavirus pandemic. To distinguish between relevant and irrelevant data, the information and any analysis of the data will be listed as such:</p>
                        <p><b>Pre-Coronavirus</b>: Anything prior to January 2020, when the first case was confirmed in the United States</p>
                        <p><b>During the pandemic</b>: Anything from January 2020 onward</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <h4 id="sectionTitle">Coronavirus Employment Effects</h4>
                <div class="col-md-4">
                    <div id="item2">
                        <h4 id="headerTitle">US Unemployment Rate, April 2019 - April 2020</h4>
                        <iframe src='https://d3fy651gv2fhd3.cloudfront.net/embed/?s=usurtot&v=202005081237V20191105&d1=20190519&h=300&w=600' height='300px' width='100%'  frameborder='0' scrolling='no'></iframe>
                        <br />
                        <h4 id="subtitle">Average Change Per Year</h4>
                        <p><b>Pre-Coronavirus</b>: 6.67% per month</p>
                        <p><b>During the pandemic</b>: 36% per month</p>
                        <h4 id="footnote">Average is defined as the change month over month divided by the total number of months. This is focused on the <b>change</b>, not the direction of the change. For "During the pandemic", the greatest
                            change is between March and April, where unemployment jumps over 330%</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div id="item3">
                        <h4 id="headerTitle">US Wage Growth, April 2019 - March 2020</h4>
                        <iframe src='https://tradingeconomics.com/embed/?s=unitedstawaggro&v=202004301856v20191105&h=300&w=600&ref=/united-states/wage-growth' height='300' width='100%'  frameborder='0' scrolling='no'></iframe>
                        <br />
                        <h4 id="subtitle">Average Change Per Year</h4>
                        <p><b>Pre-Coronavirus</b>: -.16% per month (about +4 growth per month overall)</p>
                        <p><b>During the pandemic</b>: -2.265% per month</p>
                        <h4 id="footnote">Before the pandemic, wages were growing between 4 and 5 percent consistently per month, estimated. While the growth has been gradually decreasing, the jump between Fedbruary and March, after the pandemic,
                            is over 4 percent. Wages shrank for the first time for the first time since the Great Recession in 2008.</h4>
                    </div>
                </div>
                <div class="col-md-4"
                     <div id="item3">
                         <h4 id="headerTitle">US Initial Jobless Claims, January 2020 - April 2020 (in thousands of claims)</h4>
                         <iframe src='https://d3fy651gv2fhd3.cloudfront.net/embed/?s=ijcusa&v=202005211247V20191105&d1=20200101&d2=20200521&h=300&w=600' height='300' width='600'  frameborder='0' scrolling='no'></iframe>
                         <br />
                         <h4 id="subtitle">Average Change Per Week</h4>
                         <p><b>Pre-Coronavirus (Average)</b>: 210,000</p>
                         <p><b>During the pandemic (average)</b>: 2,046,000</p>
                         <h4 id="footnote">The largest drops occurred in mid March, when two things happened: </h4>
                         <h4 id="footnote">1. The stock market fell to its lowest level since 2016</h4>
                         <h4 id="footnote">2. The US began approaching the start of the exponential growth in coronavirus cases</h4>
                         <h4 id="footnote">It is difficult to determine if we were on path to a recession prior to the coronavirus. However, the job losses began to increase significantly when lockdowns began. While they have been decreasing
                            over the course of the last 2 months, it is still very high and could go up further if there is a second wave. Whether everyone who lost their job will get it back wgen the pandemic is over is something that still
                            remains to be seen.</h4>
                     </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div id="item5">
                        <h4 id="headerTitle">nationL DEBT</h4>

                        <iframe src='https://tradingeconomics.com/embed/?s=unitedstagovdeb&v=202005091013v20191105&h=300&w=600&ref=/united-states/government-debt' height='300' width='100%'  frameborder='0' scrolling='no'></iframe>
                        <br />
                    </div>
                </div>
                <div class="col-md-4">
                    <div id="item4">
                        <h4 id="headerTitle">US Consumer Spending, January 2017 - April 2020 (in millions of dollars)</h4>
                        <iframe src='https://d3fy651gv2fhd3.cloudfront.net/embed/?s=unitedstaconspe&v=202004291429V20191105&type=type=line&h=300&w=600' height='300' width='100%'  frameborder='0' scrolling='no'></iframe>
                        <br />
                        <h4 id="footnote">Consumer spending (both for essential goods and non essential goods) makes up 70% of the US economy (Per Marketplace). It is often a good indicator of how the economy is expected to grow. It has been rising
                            consistently the last few years, but up to January of this year, it takes a sharp downturn. This is related to the unemployment rate - people are not getting paid, so they can't spend money. </h4>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function darkmode(){
                var element = document.body;
                element.classList.toggle("darkmode");
            }

        </script>
        </body>
</html>
@endsection
