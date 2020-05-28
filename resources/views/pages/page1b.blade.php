@extends('layout.master')

@section('content')
<head>
    <meta name="Tyler Race" content="">
    <title>Covid Page 1</title>
</head>

<style>
    .page-header {
        text-align: center;
    }

    [id*='item'] {
        border-radius: 8px;
        padding: 10px;
        background: #F3F3F3;
        -webkit-box-shadow: 0 8px 6px -6px black;
        -moz-box-shadow: 0 8px 6px -6px black;
        box-shadow: 0 8px 6px -6px black;
        margin-top: 20px;
    }
    .tab-pane {
        overflow: hidden;
        position: relative;
    }

    .tab-pane iframe {
        border: 0;
        height: 100%;
        left: 0;
        top: 0;
        width: 100%;
    }

    #mainPageContainer {
        margin-bottom: 20px;
    }

    #linechart1 {
        padding: 20px;
    }
</style>

<body>

<div class="page-header">
    <h1>Environmental Effects of COVID-19</h1>
</div>

<div class="container-fluid" id="mainPageContainer">
    <div class="row">
        <div class="col-md-6">
            <div id="item1" class="text-center">
                <div class="dropdown btn-group">
                    <button class="btn btn-primary dropdown-toggle dropdown-toggle-split" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#">Washington</a></li>
                        <li><a href="#">Oregon</a></li>
                        <li><a href="#">Missouri</a></li>
                        <li><a href="#">New York</a></li>
                        <li><a href="#">Illinois</a></li>
                    </ul>
                </div>
                <h2 id="loader" style="display: none">LOADING DATA FROM API...</h2>
                <div id="i1Chart">
                    <canvas id="linechart1"></canvas>
                </div>
                <div id="i1Description">
                    While a general decrease in CO2 is observed in many places, it's not seen everywhere yet.
                    This data unfortunately is somewhat old, and a better idea of the effects of COVID-19 on CO2 emissions
                    would be seen if data was available for 2020. While this data may not illustrate the expected trend,
                    it was chosen because it is from the EPA, and as time goes on, the effects will likel become more apparent.
                </div>
            </div>
        </div>
        <div class="col-md-6">

            <!--
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" data-target="#italy">Italy</a></li>
                <li><a data-toggle="tab" data-target="#china" onClick="refreshTab2()">China</a></li>
                <li><a data-toggle="tab" data-target="#chinaNOX">China NOX</a></li>
            </ul>-->



            <div id="item2">
                <h4>Average nitrogen dioxide concentrations</h4>

                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="italyTab" data-toggle="tab" href="#nav-italy" role="tab" aria-controls="nav-italy" aria-selected="true">Italy</a>
                        <a class="nav-item nav-link" id="nav-china-tab" data-toggle="tab" href="#nav-china" role="tab" aria-controls="nav-china" aria-selected="false">China</a>
                        <a class="nav-item nav-link" id="nav-chinaNOX-tab" data-toggle="tab" href="#nav-chinaNOX" role="tab" aria-controls="nav-chinaNOX" aria-selected="false">China NOx</a>
                    </div>
                </nav>
                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-italy" role="tabpanel" aria-labelledby="italyTab">
                        <iframe class="juxtapose" width="100%" height="540" scrolling="no"
                                src="https://cdn.knightlab.com/libs/juxtapose/latest/embed/index.html?uid=287d6648-97ff-11ea-a879-0edaf8f81e27"></iframe>                    </div>
                    <div class="tab-pane fade" id="nav-china" role="tabpanel" aria-labelledby="nav-china-tab">
                        <iframe id="chinaFrame" class="juxtapose" width="100%" height="540"
                                src="https://cdn.knightlab.com/libs/juxtapose/latest/embed/index.html?uid=be6bf3aa-9d62-11ea-a7cb-0edaf8f81e27"></iframe>                    </div>
                    <div class="tab-pane fade" id="nav-chinaNOX" role="tabpanel" aria-labelledby="nav-chinaNOX-tab">
                        <img src="images/NOx_emission_changes_in_East_China.jpg" width="100%" height="100%">
                        By Envsciguy - Own work, CC BY-SA 4.0, https://commons.wikimedia.org/w/index.php?curid=89921168                    </div>

                </div>

                <!--
                <ul class="nav nav-tabs" id="tabList" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="italyTab" data-toggle="tab" href="#italy" role="tab" aria-controls="One" aria-selected="true">Italy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="chinaTab" data-toggle="tab" href="#china" role="tab" aria-controls="Two" aria-selected="false">China</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="chinaNOXTab" data-toggle="tab" href="#chinaNOX" role="tab" aria-controls="Three" aria-selected="false">China NOx</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="italy" class="tab-pane fade in active" role="tabpanel" aria-labelledby="italyTab">
                        <iframe class="juxtapose" width="100%" height="540" scrolling="no"
                                src="https://cdn.knightlab.com/libs/juxtapose/latest/embed/index.html?uid=287d6648-97ff-11ea-a879-0edaf8f81e27"></iframe>
                    </div>
                    <div id="china" class="tab-pane fade" role="tabpanel" aria-labelledby="chinaTab">
                        <iframe id="chinaFrame" class="juxtapose" width="100%" height="540"
                                src="https://cdn.knightlab.com/libs/juxtapose/latest/embed/index.html?uid=be6bf3aa-9d62-11ea-a7cb-0edaf8f81e27"></iframe>
                    </div>
                    <div id="chinaNOX" class="tab-pane fade" role="tabpanel" aria-labelledby="chinaNOXTab">
                        <img src="images/NOx_emission_changes_in_East_China.jpg" width="100%" height="100%">
                        By Envsciguy - Own work, CC BY-SA 4.0, https://commons.wikimedia.org/w/index.php?curid=89921168
                    </div>
                </div>
                -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div id="item3">
                <h3>Stuff</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            </div>
        </div>
        <div class="col-md-6">
            <div id="item4">
                <h3>Stuff</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            </div>
        </div>
        <div class="col-md-2">
            <div id="item5">
                <h3>Stuff</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    let co2_2017_url = 'https://aqs.epa.gov/data/api/sampleData/byState?email=tylerrrace@gmail.com&key=greenmouse56&param=45201&bdate=20170801&edate=20171230&state=';
    let co2_2018_url = 'https://aqs.epa.gov/data/api/sampleData/byState?email=tylerrrace@gmail.com&key=greenmouse56&param=45201&bdate=20180801&edate=20181230&state=';
    let co2_2019_url = 'https://aqs.epa.gov/data/api/sampleData/byState?email=tylerrrace@gmail.com&key=greenmouse56&param=45201&bdate=20190801&edate=20191230&state=';
    let state, built_url1, built_url2, built_url3;

    $(document).ready(function(){
        $(".dropdown-menu li a").click(function(){
            var text = $(this).text();
            $(this).parents('.btn-group').find('.dropdown-toggle').html(text + ' <span class="caret"></span>');
        });
        $(".dropdown-menu li a")[0].click();
    });

    function selectState(state) {
        built_url1 = co2_2018_url + state;
        built_url2 = co2_2019_url + state;
        built_url3 = co2_2017_url + state;
        createChart1();
    }

    $('.dropdown-menu a').on('click', function(){
        $(this).parents(".dropdown").find('.btn').html($(this).text() + ' <span class="caret"></span>');
        $(this).parents(".dropdown").find('.btn').val($(this).data('value'));
        state = $(this).html();
        switch(state) {
            case 'Washington':
                selectState(53);
                break;
            case 'Oregon':
                selectState(41);
                break;
            case 'Missouri':
                selectState(29);
                break;
            case 'New York':
                selectState(36);
                break;
            case 'Illinois':
                selectState(17);
                break;
            default:
                break;
        }
    });

    function refreshTab2() {
        $( '#chinaFrame' ).attr( 'src', function ( i, val ) { return val; });
    }

    async function createChart1() {
        $('#linechart1').remove();
        $('#i1Chart').html('<canvas id="linechart1"></canvas>');
        const data = await getChart1Data();
        const ctx = document.getElementById('linechart1');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.xs,
                datasets: [{
                    label: '2017 AQI Index in ' + state,
                    data: data.ys3,
                    fill: false,
                    borderColor: 'rgba(234, 152, 0, 1)',
                    borderWidth: 1
                },
                {
                    label: '2018 AQI Index in ' + state,
                    data: data.ys,
                    fill: false,
                    borderColor: 'rgba(234, 0, 3, 1)',
                    borderWidth: 1
                },
                {
                    label: '2019 AQI Index in ' + state,
                    data: data.ys2,
                    fill: false,
                    borderColor: 'rgba(0, 24, 209, 1)',
                    borderWidth: 1
                }
                ]
            },
            options: {
                elements: {
                    point:{
                        radius: 0
                    }
                },
                scales: {
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Parts per billion of Carbon'
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            callback: function(value, index, values) {
                                let arr = value.split("-");
                                    return arr[1] + "-" + arr[2];
                            }
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Date of sample'
                        }
                    }]
                }
            }
        });
    }
    async function getChart1Data() {
        const xs =[];
        const ys = [];
        const xs2 =[];
        const ys2 = [];
        const xs3 =[];
        const ys3 = [];

        document.getElementById('loader').style.display = 'block';
        const response = await fetch(built_url1);
        const response2 = await fetch(built_url2);
        const response3 = await fetch(built_url3);
        const data = await response.json();
        const data2 = await response2.json();
        const data3 = await response3.json();
        document.getElementById('loader').style.display = 'none';
        data['Data'].forEach(obj => {
            /*
            Object.entries(obj).forEach(([key, value]) => {
                console.log(`${key} ${value}`);
            });*/

            xs.push(obj['date_local']);
            ys.push(parseFloat(obj['sample_measurement']));
        });
        data2['Data'].forEach(obj => {
            /*
            Object.entries(obj).forEach(([key, value]) => {
                console.log(`${key} ${value}`);
            });*/

            xs2.push(obj['date_local']);
            ys2.push(parseFloat(obj['sample_measurement']));
        });
        data3['Data'].forEach(obj => {
            /*
            Object.entries(obj).forEach(([key, value]) => {
                console.log(`${key} ${value}`);
            });*/

            xs3.push(obj['date_local']);
            ys3.push(parseFloat(obj['sample_measurement']));
        });

        return {xs, ys, xs2, ys2, xs3, ys3};
    }

</script>

</body>

@endsection
