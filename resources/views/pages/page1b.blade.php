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
    #mainPageContainer {
        margin-left: 40px;
        margin-right: 40px;
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

<body>

<div class="page-header">
    <h1>Environmental Effects of COVID-19</h1>
</div>

<div class="container-fluid" id="mainPageContainer">
    <div class="row">
        <div class="col-md-6">
            <div id="item1">
                <div class="dropdown">
                    Select a state:
                    <button class="btn btn-secondary dropdown-toggle dropdown-toggle-split" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#">Washington</a></li>
                        <li><a href="#">Oregon</a></li>
                        <li><a href="#">Missouri</a></li>
                        <li><a href="#">New York</a></li>
                    </ul>
                </div>
                <h2 id="loader" style="display: none">LOADING DATA FROM API...</h2>
                <div id="item1Chart">
                    <canvas id="linechart1"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div id="item2">
                <canvas id="linechart2"></canvas>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div id="item2">
                <h3>Stuff</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            </div>
        </div>
        <div class="col-md-6">
            <div id="item4">
                <h4>Average nitrogen dioxide concentrations</h4>
                <iframe frameborder="0" class="juxtapose" width="100%" height="670"
                    src="https://cdn.knightlab.com/libs/juxtapose/latest/embed/index.html?uid=287d6648-97ff-11ea-a879-0edaf8f81e27"></iframe>
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
    let co2_2017_url = 'https://aqs.epa.gov/data/api/sampleData/byState?email=tylerrrace@gmail.com&key=greenmouse56&param=45201&bdate=20170101&edate=20171230&state=';
    let co2_2018_url = 'https://aqs.epa.gov/data/api/sampleData/byState?email=tylerrrace@gmail.com&key=greenmouse56&param=45201&bdate=20180101&edate=20181230&state=';
    let co2_2019_url = 'https://aqs.epa.gov/data/api/sampleData/byState?email=tylerrrace@gmail.com&key=greenmouse56&param=45201&bdate=20190101&edate=20191230&state=';
    let state, built_url1, built_url2, built_url3;

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
            default:
                break;
        }
    });

    //createChart2();

    async function createChart1() {
        $('#linechart1').remove();
        $('#item1Chart').html('<canvas id="linechart1"></canvas>');
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

    /*async function createChart2() {
        const data = await getChart2Data();
        const ctx = document.getElementById('linechart2');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.xs,
                datasets: [{
                    label: 'Global Average Temperature',
                    data: data.ys,
                    fill: false,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            }
        });
    }
    async function getChart2Data() {
        const xs = [];
        const ys =[];

        const response = await fetch('data.csv');
        const data = await response.text();

        const table = data.split("\n").slice(1);
        table.forEach(row => {
            const columns = row.split(',');
            const year = columns[0];
            const temp = columns[1];
            xs.push(year);
            ys.push(parseFloat(temp) + 14);
        });

        return {xs, ys};
    }*/
</script>

</body>

@endsection
