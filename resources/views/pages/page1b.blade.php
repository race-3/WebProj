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
                        <li><a href="#">Idaho</a></li>
                        <li><a href="#">New York</a></li>
                        <li><a href="#">California</a></li>
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
    let co2_url = 'https://aqs.epa.gov/data/api/sampleData/byState?email=tylerrrace@gmail.com&key=greenmouse56&param=45201&bdate=20190101&edate=20191201&state=';
    let state = '';

    function selectState(state) {
        built_url = co2_url + state;
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
            case 'Idaho':
                selectState(16);
                break;
            case 'New York':
                selectState(36);
                break;
            case 'California':
                selectState(0o6);
                break;
            default:
                break;
        }
    });

    createChart2();

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
                    label: 'AQI Index in ' + state,
                    data: data.ys,
                    fill: false,
                    backgroundColor: 'rgba(140, 140, 140, 0.2)',
                    borderColor: 'rgba(0, 0, 0, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Parts per billion of Carbon'
                        }
                    }],
                    xAxes: [{
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

        document.getElementById('loader').style.display = 'block';
        const response = await fetch(built_url);
        const data = await response.json();
        document.getElementById('loader').style.display = 'none';
        data['Data'].forEach(obj => {
            /*
            Object.entries(obj).forEach(([key, value]) => {
                console.log(`${key} ${value}`);
            });*/

            xs.push(obj['date_local']);
            ys.push(parseFloat(obj['sample_measurement']));
        });

        return {xs, ys};
    }

    async function createChart2() {
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
    }
</script>

</body>

@endsection
