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
        margin: 40px;
    }
    [id*='item'] {
        border-radius: 8px;
        border: 1px solid black;
        padding: 10px;
        -webkit-box-shadow: 0 8px 6px -6px black;
        -moz-box-shadow: 0 8px 6px -6px black;
        box-shadow: 0 8px 6px -6px black;
    }
    .row {
        margin-top: 20px;
    }
</style>

<body>

<div class="page-header">
    <h1>Environmental Effects of COVID-19</h1>
</div>

<div class="container-fluid" id="mainPageContainer">
    <div class="row">
        <div class="col-sm-6">
            <div id="item1">
                <canvas id="linechart1"></canvas>
            </div>
        </div>
        <div class="col-sm-6">
            <div id="item3">
                <canvas id="linechart2"></canvas>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div id="item3">
                <h3>Stuff</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    const epa_url = 'https://aqs.epa.gov/data/api/sampleData/byState?email=tylerrrace@gmail.com&key=greenmouse56&param=45201&bdate=20180401&edate=20180501&state=53';

    createChart2();
    createChart1();

    async function createChart1() {
        const data = await getChart1Data();
        const ctx = document.getElementById('linechart1');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.xs,
                datasets: [{
                    label: 'AQI Index in Washington',
                    data: data.ys,
                    fill: false,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            }
        });
    }
    async function getChart1Data() {
        const xs =[];
        const ys = [];

        const response = await fetch(epa_url);
        const data = await response.json();
        data['Data'].forEach(obj => {
            /*
            Object.entries(obj).forEach(([key, value]) => {
                console.log(`${key} ${value}`);
            });*/

            xs.push(obj['date_local']);
            ys.push(parseFloat(obj['sample_measurement']));
        });

        console.log(xs, ys);
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
