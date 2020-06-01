@extends('layout.master')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
      <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">

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
    var dataPoints = [];
    var chart;
    var stockName;
    var theStock;
    var curDate = Math.round((new Date()).getTime() / 1000);
    var times = [1577865651,1580603364 ,1583108964,1585783779,1588375764,1591054179 ];
    $(function() {
      $('#datetimepicker1').datetimepicker();
      $('#datetimepicker2').datetimepicker();
      chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2", // "light1", "light2", "dark1", "dark2"
        exportEnabled: true,
        title: stockName,
        subtitles: [{
          text: ""
        }],
        axisX: {
          interval: 1,
          valueFormatString: "MMM DD HH:00"
        },
        axisY: {
          includeZero: false,
          prefix: "$",
          title: "Price"
        },
        toolTip: {
          content: "Date: {x}<br /><strong>Price:</strong><br />Open: {y[0]}, Close: {y[3]}<br />High: {y[1]}, Low: {y[2]}"
        },
        data: [{
          type: "candlestick",
          yValueFormatString: "$##0.00",
          dataPoints: dataPoints
        }]
      });
      $('#sym').val("AAPL");
      loadStock(times[0] ,curDate,$('#sym').val()).then(function(){loadCandle(theStock);});

    }); // end of 

    function getUnixDate() {
      var date1 = $('#datetimepicker1').data("DateTimePicker").date();
      var date2 = $('#datetimepicker2').data("DateTimePicker").date();
      var sym = $('#sym').val();
      console.log(date1,date2);
      console.log(sym);
      if( date1 && date2 ){
        date1 = date1.unix();
        date2 = date2.unix();
        if (date2 > date1){
          loadStock(date1,date2,sym).then(function(){loadCandle(theStock);});
        }else{
          alert("Second date has to be after the first.");
        }
      }
    }

    function loadStock(start, end, sym){
      console.log(start,end,sym);
      var data = $.getJSON("https://finnhub.io/api/v1/stock/candle?symbol="+sym.toUpperCase()+"&resolution=1&from="+start+"&to="+end+"&token={{$api_key}}",function(dat){setStock(dat)});
      return data;
    }

    function getTick(sym){
      var test;
      loadStock(times[0],times[-1],sym).then(function(){test = theStock;});
      return test;
    }

    function setStock(data){
      theStock = data;
    }

    function loadCandle(data) {
      dataPoints.length = 0;
      console.log(data);
      if (data['s'] == "ok") {
        for (var i = 0; i < data['c'].length; i++) {
          dataPoints.push({
            x: new Date(
                data['t'][i] * 1000
            ),
            y: [
              parseFloat(data['o'][i]),
              parseFloat(data['h'][i]),
              parseFloat(data['l'][i]),
              parseFloat(data['c'][i])
            ]
          });
        }
      }else{
        console.log("error");
      }
      chart.render();
    }

  </script>
    </head>
    <body>
      <div class="row">
        <div class="col-6 col-lg-3">.col-6 .col-sm-3
        </div>
        <div class="col-6 col-lg-3">
          <table class="table table-sm table-dark">
            <thead>
              <tr>
                <th scope="col">Stock</th>
                <th scope="col">Jan</th>
                <th scope="col">Mar</th>
                <th scope="col">Now</th>
              </tr>
            </thead>
            <tbody id="stockRankBody">
              <!-- <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
              </tr> -->
            </tbody>
          </table>
        </div>

  <!-- Force next columns to break to new line -->
        <div class="w-100">
          <br>
        </div>
        <div class="col-6 col-lg-3">
          <form  onsubmit="getUnixDate();return false">
            <div class="container">
              <div class="row">
                <div class='col-sm-6'>
                  <div class="form-group">
                    <input type="text" name="symbol" id="sym" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class='col-sm-6'>
                  <div class="form-group">
                    <div class='input-group date' id='datetimepicker1'>
                      <input type='text' class="form-control" name="datetimepicker1" id='datetimepicker1box'/>
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
                      <input type='text' class="form-control" name="datetimepicker2" id='datetimepicker2box'/>
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
          <input type="submit" name="submit" value="Submit">
        </form>
        <div class="col-6 col-lg-3">
          <div id="chartContainer" style="height: 370px; width: 700px;"></div>
        </div>
      </div>
    </body>
</html>
@endsection
