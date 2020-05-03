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
                color: red;
            }
        </style>
    </head>
    <body>
        <h3 id="title1">Tyler's Page!!!</h3>
    </body>
</html>
@endsection
