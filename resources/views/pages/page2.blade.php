@extends('layout.master')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>




        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Stocks</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            #title1 {
                color: red;
            }
        </style>

  <script type="text/javascript">
    $(function() {
      $('#datetimepicker1').datetimepicker();
      $('#datetimepicker2').datetimepicker();
    });

    function getUnixDate() {
      var date1 = $('#datetimepicker1').data("DateTimePicker").date();
      var date2 = $('#datetimepicker2').data("DateTimePicker").date();
      if( date1 && date2 ){
        date1 = date1.unix();
        date2 = date2.unix();
        if (date2 > date1){
          loadStock(date1,date2);
        }else{
          alert("Second date has to be after the first.");
        }
      }
    }

    function loadStock(start, end){
      var test = [];
      console.log(start,end);
      var data = $.getJSON("https://finnhub.io/api/v1/stock/candle?symbol=AAPL&resolution=1&from="+start+"&to="+end+"&token={{$api_key}}", function(dat){
          test.push(dat);
      });
      console.log(test);
    }

  </script>
    </head>
    <body>
      <div class="row">
        <div class="col-6 col-sm-3">.col-6 .col-sm-3
        </div>
        <div class="col-6 col-sm-3">.col-6 .col-sm-3
        </div>

  <!-- Force next columns to break to new line -->
        <div class="w-100">
          
        </div>

        <div class="col-6 col-sm-3">
          <div class="container">
            <div class="row">
              <div class='col-sm-6'>
                <div class="form-group">
                  <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class='col-sm-6'>
                <div class="form-group">
                  <div class='input-group date' id='datetimepicker2'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <br>
        <input type="button" name="submit" value="Submit" onclick="getUnixDate();return false">
        <div class="col-6 col-sm-3">
          <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        </div>
      </div>
    </body>
</html>
@endsection
