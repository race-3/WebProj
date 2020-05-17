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
</style>

<body>

<div class="page-header">
    <h1>Environmental Effects of COVID-19</h1>
</div>

<div class="container-fluid" id="mainPageContainer">
    <div class="row">
        <div class="col-sm-6">
            <div id="item1">
                <canvas id="barChart"></canvas>
            </div>
        </div>
        <div class="col-sm-6">
            <div id="item3">
                <canvas id="linechart"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div id="item3">
                    <h3>Column 3</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    const xLabels = [];
    const yTemps =[];

    createChart();

    async function createChart() {
        await getChartData();
        const ctx = document.getElementById('linechart');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: xLabels,
                datasets: [{
                    label: 'Global Average Temperature',
                    data: yTemps,
                    fill: false,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            }
        });
    }

    async function getChartData() {
        const response = await fetch('data.csv');
        const data = await response.text();

        const table = data.split("\n").slice(1);
        table.forEach(row => {
            const columns = row.split(',');
            const year = columns[0];
            const temp = columns[1];
            xLabels.push(year);
            yTemps.push(parseFloat(temp) + 14);
            console.log(year, temp);
        });
    }
</script>

</body>

@endsection
