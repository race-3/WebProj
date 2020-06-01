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
                color: gray();
            }

            #switchText {
                text-align: center;
                padding-top: 10px;
                padding-bottom: 5px;
                font-weight: 700;
                font-size: 175%;
            }

            #subtitle {
                color: gray;
            }

            #footnote {
                color: lightslategray;
                font-style: italic;
                opacity: 1;
                transition: opacity 1s;
            }

            #footnote.hide {
                opacity: 0;
            }

            #btnText {
                vertical-align: bottom;
                font-size: small;
            }

            #mainContainer {
                margin-left: 50px;
                margin-right: 50px;
                top: 100px;
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

            [id*='item']:hover {
                background-color: #999999;
            }

            .switch {
                position: relative;
                display: inline-block;
                width: 55px;
                height: 25px;
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
                height: 18px;
                width: 18px;
                left: 4px;
                bottom: 4px;
                background-color: white;
                -webkit-transition: .4s;
                transition: .4s;
            }

            input:checked + .slider {
                background-color: #DC143C;
            }

            input:checked + .slider:before {
                -webkit-transform: translateX(28px);
                -ms-transform: translateX(28px);
                transform: translateX(28px);
            }

            .slider.round {
                border-radius: 35px;
            }

            .slider.round:before {
                border-radius: 50%;
            }

            .darkmode {
                background-color: #353535;
                color: #D0D0D0;
            }

            .button {
                border: solid black;
                border-width: 0 7px 7px 0;
                margin: 5px;
                display: inline-block;
                padding: 3px;
                background-color: transparent;
                transform: rotate(-135deg);
                -webkit-transform: rotate(-135deg);
            }

            #topbtn {
                position: fixed;
                bottom: 20px;
                right: 30px;
                z-index: 2;
                font-size: 20px;
                background-color: darkturquoise;
                color: black;
                padding: 15px;
                transition: 0.3s;
            }

            #nextbtn {
                position: fixed;
                bottom: 20px;
                right: 120px;
                z-index: 2;
                font-size: 20px;
                background-color: darkturquoise;
                color: black;
                padding: 15px;
                transition: 0.3s;
            }

            #prevbtn {
                position: fixed;
                bottom: 20px;
                right: 210px;
                z-index: 2;
                font-size: 20px;
                background-color: darkturquoise;
                color: black;
                padding: 15px;
                transition: 0.3s;
            }

            #homebtn {
                position: fixed;
                bottom: 20px;
                right: 300px;
                z-index: 2;
                font-size: 20px;
                background-color: darkturquoise;
                color: black;
                padding: 15px;
                transition: 0.3s;
            }

            #topbtn:hover,
            #prevbtn:hover,
            #nextbtn:hover,
            #homebtn:hover {
                background-color: darkcyan;
            }

        </style>
    </head>

    <body>
        <h3 id="title1">Economic Impacts of COVID-19</h3>
        <h4 id="title-footnote">Non-stock market related economic changes since the start of the coronavirus pandemic</h4>
        <h4 id="switchText">Dark Mode  <label class="switch">
            <input type="checkbox" onclick="darkmode()">
            <span class="slider round"></span>
        </label>
        </h4>

        <button onclick="toTop()" id="topbtn">Top</button>
        <button onclick="toNext()" id="nextbtn">Next</button>
        <button onclick="toPrev()" id="prevbtn">Prev</button>
        <button onclick="toHome()" id="homebtn">Home</button>

        <hr color="darkgray">
        <div class="container-fluid" id="mainContainer">
            <div class="row">
                <div class="col-md-12">
                    <div id="item1">
                        <h3>About this Data</h3>
                        <p>This data uses charts that gather data from between 1 - 3 years to present. As such, not all of it is relevant to the ongoing coronavirus pandemic. To distinguish between relevant and irrelevant data, the information and any analysis of the data will be listed as such:</p>
                        <p><b>Pre-Coronavirus</b>: Anything prior to January 2020, when the first case was confirmed in the United States</p>
                        <p><b>During the pandemic</b>: Anything from January 2020 onward</p>
                    </div>
                </div>
            </div>

            <br>
            <div class="row">
                <div class="col-md-12">
                    <h4 id="sectionTitle">Coronavirus Employment Effects</h4>
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

                        <button class="button" id="footnotebtn" onclick="fade()"></button>
                        <span id="btnText">Hide Footnote</span>

                        <br><h4 id="footnote">Average is defined as the change month over month divided by the total number of months. This is focused on the <b>change</b>, not the direction of the change. For "During the pandemic", the greatest
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

                        <button class="button" id="footnotebtn" onclick="fade()"></button>
                        <span id="btnText">Hide Footnote</span>

                        <br><h4 id="footnote">Before the pandemic, wages were growing between 4 and 5 percent consistently per month, estimated. While the growth has been gradually decreasing, the jump between February and March, after the pandemic,
                            is over 4 percent. Wages shrank for the first time for the first time since the Great Recession in 2008.</h4>
                    </div>
                </div>
                <div class="col-md-4">
                     <div id="item4">
                         <h4 id="headerTitle">US Initial Jobless Claims, January 2020 - April 2020 (in thousands of claims)</h4>
                         <iframe src='https://d3fy651gv2fhd3.cloudfront.net/embed/?s=ijcusa&v=202005211247V20191105&d1=20200101&d2=20200521&h=300&w=600' height='300' width='600'  frameborder='0' scrolling='no'></iframe>
                         <br />

                         <h4 id="subtitle">Average Change Per Week</h4>
                         <p><b>Pre-Coronavirus (Average)</b>: 210,000</p>
                         <p><b>During the pandemic (average)</b>: 2,046,000</p>

                         <button class="button" id="footnotebtn" onclick="fade()"></button>
                         <span id="btnText">Hide Footnote</span>

                         <h4 id="footnote">The largest drops occurred in mid March, when two things happened: </h4>
                         <h4 id="footnote">1. The stock market fell to its lowest level since 2016</h4>
                         <h4 id="footnote">2. The US began approaching the start of the exponential growth in coronavirus cases</h4>
                         <h4 id="footnote">It is difficult to determine if we were on path to a recession prior to the coronavirus. However, the job losses began to increase significantly when lockdowns began. While they have been decreasing
                            over the course of the last 2 months, it is still very high and could go up further if there is a second wave. Whether everyone who lost their job will get it back wgen the pandemic is over is something that still
                            remains to be seen.</h4>
                     </div>
                </div>
            </div>

            <br>
            <div class="row">
                <div class="col-md-12">
                    <h4 id="sectionTitle">Coronavirus Government Spending Effects</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div id="item5">
                        <h4 id="headerTitle">US National Debt (in millions of dollars)</h4>
                        <iframe src='https://tradingeconomics.com/embed/?s=unitedstagovdeb&v=202005091013v20191105&h=300&w=600&ref=/united-states/government-debt' height='300' width='100%'  frameborder='0' scrolling='no'></iframe>
                        <br />

                        <button class="button" id="footnotebtn" onclick="fade()"></button>
                        <span id="btnText">Hide Footnote</span>

                        <br><h4 id="footnote">The CARES Act, signed by Congress on March 25th and by the President on March 27th, was an almost $2 trillion dollar spending package that added a significant amount to the national debt between the months
                                of March and April. The US National Debt exceeded $25 trillion in May.</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div id="item6">
                        <h4 id="headerTitle">US Government Debt to GDP (Percent)</h4>
                        <iframe src='https://d3fy651gv2fhd3.cloudfront.net/embed/?s=usadebt2gdp&v=202002101806V20191105&d1=20100604&h=300&w=600' height='300' width='600'  frameborder='0' scrolling='no'></iframe><br />
                        <br />

                        <button class="button" id="footnotebtn" onclick="fade()"></button>
                        <span id="btnText">Hide Footnote</span>

                        <br><h4 id="footnote">While the coronavirus hasn't had the biggest impact on the debt to GDP ratio, it has been steadily rising over the course of the past decade, reaching a high not seen before since the Great Depression.
                                While we are still experiencing the effects of the coronavirus and with discussion of another possible spending package, it is possible that we might get close to exceeding the all time high of 118.9%, as the
                                coronavirus has not only increased government debt, but has also shrank the economy.</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div id="item6">
                        <h4 id="headerTitle">US Government Spending (in billions of dollars)</h4>
                        <iframe src='https://tradingeconomics.com/embed/?s=unitedstagovspe&v=202006011208v20191105&h=300&w=600&ref=/united-states/government-spending' height='300' width='600'  frameborder='0' scrolling='no'></iframe><br />
                        <br />

                        <button class="button" id="footnotebtn" onclick="fade()"></button>
                        <span id="btnText">Hide Footnote</span>

                        <br><h4 id="footnote">US Government spending has increased significantly higher after the Republicans passed the Tax Cuts bill in 2018, but the coronavirus pandemic has also added a $2.4 trillion spending package on top of
                                any spending package that Congress passed previously.</h4>
                    </div>
                </div>
            </div>

            <br>
            <div class="row">
                <div class="col-md-12">
                    <h4 id="sectionTitle">Coronavirus Consumer Related Effects</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div id="item7">
                        <h4 id="headerTitle">US Consumer Spending, January 2017 - April 2020 (in millions of dollars)</h4>
                        <iframe src='https://d3fy651gv2fhd3.cloudfront.net/embed/?s=unitedstaconspe&v=202004291429V20191105&type=type=line&h=300&w=600' height='300' width='100%'  frameborder='0' scrolling='no'></iframe>
                        <br />

                        <button class="button" id="footnotebtn" onclick="fade()"></button>
                        <span id="btnText">Hide Footnote</span>

                        <h4 id="footnote">Consumer spending (both for essential goods and non essential goods) makes up 70% of the US economy (Per Marketplace). It is often a good indicator of how the economy is expected to grow. It has been rising
                            consistently the last few years, but up to January of this year, it takes a sharp downturn. This is related to the unemployment rate - people are not getting paid, so they can't spend money. </h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div id="item8">
                        <h4 id="headerTitle">Gas Prices (in cents per liter)</h4>
                        <iframe src='https://tradingeconomics.com/embed/?s=unitedstgaspri&v=202005272252v20191105&h=300&w=600&ref=/united-states/gasoline-prices' height='300' width='600'  frameborder='0' scrolling='no'></iframe>
                        <br />

                        <h4 id="subtitle">Average Cost per Liter (4 liters = 1 gallon)</h4>
                        <p><b>Pre-Coronavirus</b>: 69 cents per liter</p>
                        <p><b>During the pandemic</b>: 58 cents per liter</p>

                        <button class="button" id="footnotebtn" onclick="fade()"></button>
                        <span id="btnText">Hide Footnote</span>

                        <br><h4 id="footnote">Travel being limited meant that gas prices were inevitably going to go down. The pollution maps show just how much emissions have reduced during the pandemic, and gas prices have also followed accordingly.
                                While some of this is to blame on the Russia-Saudi Arabia oil dispute, the coronavirus tanking the oil market is what lead to the sharp drop in prices. The price of oil per barrel fell to a low of -$35 </h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div id="item9">
                        <h4 id="headerTitle">US 30-Year Mortgage Interest Rate (Percent)</h4>
                        <iframe src='https://d3fy651gv2fhd3.cloudfront.net/embed/?s=unitedstamorrat&v=202005271133V20191105&d1=20190602&h=300&w=600' height='300' width='600'  frameborder='0' scrolling='no'></iframe>
                        <br />

                        <button class="button" id="footnotebtn" onclick="fade()"></button>
                        <span id="btnText">Hide Footnote</span>

                        <br><h4 id="footnote">The 30 year mortgage yield hit its all time low on May 6th (3.4%). While the rate has been dropping steadily, primarily due to uncertainty over an impending recession, the rate dropped significantly after the
                                coronavirus became more of an issue in the US. There was a temporary spike in March, but it later declined back to its level around 3.4 - 3.6%. Should we officially enter a recession, it is likely that the rate will drop
                                even further.</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div id="item10">
                        <h4 id="headerTitle">US Consumer Spending Growth, April 2019 - April 2020 (Percent)</h4>
                        <iframe src='https://tradingeconomics.com/embed/?s=unitedstaperspe&v=202005291252v20191105&h=300&w=600&ref=/united-states/personal-spending' height='300' width='600'  frameborder='0' scrolling='no'></iframe>
                        <br />

                        <h4 id="subtitle">Average Change</h4>
                        <p><b>Pre-Coronavirus</b>: +.34%</p>
                        <p><b>During the pandemic</b>: -4.975%</p>

                        <button class="button" id="footnotebtn" onclick="fade()"></button>
                        <span id="btnText">Hide Footnote</span>

                        <h4 id="footnote">US consumer spending has been rising steadily as the economy grew consistently. Despite people spending more on food, cleaning supplies, and other essentials, entertainment, travel, and non essential spending
                            dropped significantly after quarantines were in order across the country. The largest growth was between March and April, where it dropped over 13% compared to the previous month. As states starts to open, this could improve
                            slightly, but a second wave and quarantine could still prevent growth in consumer spending</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div id="item11">
                        <h4 id="headerTitle">US Retail Sales Growth, April 2019 - April 2020 (Percent)</h4>
                        <iframe src='https://tradingeconomics.com/embed/?s=usaretailsalesyoy&v=202005151251v20191105&h=300&w=600&ref=/united-states/retail-sales-annual' height='300' width='600'  frameborder='0' scrolling='no'></iframe>
                        <br />

                        <h4 id="subtitle">Average Change</h4>
                        <p><b>Pre-Coronavirus</b>: +3.84%</p>
                        <p><b>During the pandemic</b>: -4.475%</p>

                        <button class="button" id="footnotebtn" onclick="fade()"></button>
                        <span id="btnText">Hide Footnote</span>

                        <h4 id="footnote">Despite online shopping taking over significant sales from retail, it has been growing consistently prior to the coronavirus pandemic, which lead to malls shutting down and stores only allowing limited numbers of people
                            into stores at the same time to prevent the spread. The single largest drop, 21.6% between March and April, is the single largest month to month drop since the data was first taken back in 1990.</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div id="item12">
                        <h4 id="headerTitle">US Housing Value Growth, April 2019 - April 2020 (Percent)</h4>
                        <iframe src='https://tradingeconomics.com/embed/?s=unitedstahouind&v=202005261310v20191105&h=300&w=600&ref=/united-states/housing-index' height='300' width='600'  frameborder='0' scrolling='no'></iframe>
                        <br />

                        <h4 id="subtitle">Average Change</h4>
                        <p><b>Pre-Coronavirus</b>: +.475%</p>
                        <p><b>During the pandemic</b>: +.43%</p>

                        <button class="button" id="footnotebtn" onclick="fade()"></button>
                        <span id="btnText">Hide Footnote</span>
                        <h4 id="footnote">The coronavirus has not had as large of an impact on home value. This could be due to the drop in mortgate interest percent - as that drops, more people are inclined to take out a loan and buy a house. However, the rate of
                            growth did drop to its lowest percent over the course of the last year, which could be signs of slowdown or decline.</h4>
                    </div>
                </div>
            </div>

        </div>

        <script>
            //Javascript code. Miscellaneous effect functions.

            //Activate dark mode!
            function darkmode() {
                var element = document.body;
                element.classList.toggle("darkmode");
            }

            //Hide subtitles and fade text
            function fade() {
                var toFade = document.getElementById("footnote");
                var updatebtn = document.getElementById("footnotebtn");
                //var updateText = document.getElementById("btnText")
                if (toFade.classList.contains("hide")) {
                    document.getElementById("btnText").innerHTML = "Hide Footnote";
                    updatebtn.style.transform = "rotate(-135deg)";
                    toFade.classList.remove("hide");
                } else {
                    document.getElementById("btnText").innerHTML = "Show Footnote";
                    updatebtn.style.transform = "rotate(45deg)";
                    toFade.classList.add("hide");
                }
            }

            //If the user scrolls past a certain point, display the button
            window.onscroll = function() {
                scroll();
            };

            //If the user scrolls past a certain point, display the button
            function scroll() {
                var topbutton = document.getElementById("topbtn");
                var nextbutton = document.getElementById("nextbtn");
                var prevbutton = document.getElementById("prevbtn");
                var homebutton = document.getElementById("homebtn");
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    topbutton.style.display = "block";
                    nextbutton.style.display = "block";
                    prevbutton.style.display = "block";
                    homebutton.style.display = "block";
                }
                else {
                    topbutton.style.display = "none";
                    nextbutton.style.display = "none";
                    prevbutton.style.display = "none";
                    homebutton.style.display = "none";
                }
            }

            //If user clicks on 'top' button, advance to top of document.
            function toTop() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }

            //If user clicks on 'next' button, advance to next page (environmental)
            function toNext() {
                window.location.href = "{{ route("environment") }}"
            }

            //If user clicks on 'prev' button, advance to previous page (stock market)
            function toPrev() {
                window.location.href = "{{ route("page2") }}"
            }

            //If user clicks on 'home' button, advance to home page
            function toHome(){
                window.location.href = "{{ route("home") }}"
            }

            /*
            function advanceLeft() {
                current = document.getElementsByClassName("nav-item");
                if(current.length) {
                    window.location.href = "route("page2")";
                }
                else {
                    current = document.getElementsByClassName("nav-item");
                    if (current.length) {
                        window.location.href = "route("page3")";
                    }
                    else {
                        current = document.getElementsByClassName("nav-item");
                        if (current.length) {
                            window.location.href = "route("page1")";
                        }
                    }
                }
            }

            function advanceRight() {
                current = document.getElementsByClassName("nav-item");
                if(current.length) {
                    window.location.href = "route("page3")";
                }
                else {
                    current = document.getElementsByClassName("nav-item");
                    if (current.length) {
                        window.location.href = "route("page1")";
                    }
                    else {
                        current = document.getElementsByClassName("nav-item");
                        if (current.length) {
                            window.location.href = "route("page2")";
                        }
                    }
                }
            }
            */
        </script>
        </body>
</html>
@endsection
