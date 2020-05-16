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
    [class*="item"] {
        border: 1px solid black;
    }
</style>

<body>

<div class="page-header">
    <h1>Environmental Effects of COVID-19</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-4 border border-dark rounded" id="item1">
            <h3>Column 1</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
        </div>
        <div class="col-sm-4" id="item2">
            <h3>Column 2</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
        </div>
        <div class="col-sm-4" id="item3">
            <h3>Column 3</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
        </div>
    </div>
</div>

<script type="text/javascript">

</script>

</body>

@endsection
