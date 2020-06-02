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
            body{
              background: #111;
            }
            .card-title{
              color: #111;
              font-family: 'Helvetica Neue', sans-serif;
              font-size: 16px;
              font-weight: bold;
              letter-spacing: -1px;
              line-height: 1;
              text-align: center;
            }
            .card-text{
              color:blue;
            }
            .card{
              margin: 3px;
            }
            #newsRows{
              margin-left: 20px;
            }
        </style>

  <script type="text/javascript">
    var dataPoints = [];
    var chart;
    var stockName;
    var theStock;
    var curDate = Math.round((new Date()).getTime() / 1000);
    var times = [1577865651,1580603364 ,1583108964,1585783779,1588375764,1591054179]; //by month
    var someStocks =[["Apple","AAPL"],["Ford","F"],["Disney","DIS"],["American Airlines","AAL"],["Microsoft","MSFT"],["Bank of America","BAC"],["Tesla","TSLA"],["Uber","UBER"],["Starbucks","SBUX"],["AT&T","T"]];

    $(function() {
      $('#datetimepicker1').datetimepicker();
      $('#datetimepicker2').datetimepicker();
      chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "dark1", // "light1", "light2", "dark1", "dark2"
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
      //loadStock(times[0] ,curDate,$('#sym').val()).then(function(){loadCandle(theStock);});

      // for (var i = someStocks.length - 1; i >= 0; i--) {
      //   loadRanking(i);
      // }
      for (var i = someStocks.length - 1; i >= 0; i--) {
        getCompanyNews(i);  
      }
      getLastestNews();//.then(function(){console.log(theStock);});
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

    function loadRanking(i){
          loadStock(times[0],times[times.length-1],someStocks[i][1]).then(value =>{
          if (theStock['s'] == "ok") {
            var stock = [theStock['c'][0],theStock['c'][Math.round(theStock['c'].length/2)],theStock['c'][theStock['c'].length-1]];
            var text1, text2;
            if(stock[0] > stock[1]){
              text1 = "red";
            }else{
              text1 = "green";
            }
            if (stock[1] > stock[2]) {
              text2 = "red";
            }else{
              text2 = "green";
            }
            $('#stockRankBody').append("<tr><th scope='row'>"
              +someStocks[i][0]
              +"</th><td>"
              +someStocks[i][1]
              +"</td><td>"
              +stock[0]
              +"</td><td style='color:"
              +text1
              +";'>"
              +stock[1]
              +"</td><td style='color:"
              +text2
              +";'>"
              +stock[2]
              +"</td></tr>");
          }
        });
    }

    function getCompanyNews(i){
      var today = new Date();
      today = today.getFullYear() + '-' + today.getMonth() + '-' + today.getDate();
      var data = $.getJSON("https://finnhub.io/api/v1/company-news?symbol="+someStocks[i][1]+"&from=2020-01-01&to="+today+"&token={{$api_key}}",
        function(dat){
          generateNewsCard(dat);
        }
      );
      return data;
    }

    function getLastestNews (){
      var data = $.getJSON("https://finnhub.io/api/v1/news?category=general&token={{$api_key}}",
        function(dat){
          console.log(dat);
          generateNewsCard(dat);
        }
      );
      return data;
    }

    function generateNewsCard(data){
      var headline, summary;
      $('#news').append("<div id='newsRows' class='row'>");
      for (var i = 0; i < data.length; i++) {
        headline = data[i]["headline"].toLowerCase();
        summary = data[i]["summary"].toLowerCase();
        if(headline.includes("corona") || headline.includes("covid") || summary.includes("corona") || summary.includes("covid")){
          $('#newsRows').append("<div class='card' style='width: 18rem;'><img class='card-img-top' src="
            +data[i]["image"]
            +" alt='Card image cap'><div class='card-body'><h5 class='card-title'>"
            +headline.slice(0,20)
            +"</h5><p class='card-text'>"
            +summary.slice(0,20)
            +"</p><a href="
            +data[i]["url"]
            +" class='btn btn-primary'>View</a></div></div>"
          ); 
        }
      }
      $('#news').append("</div>");
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
        chart.render();
      }else{
        console.log("error rendering chart");
      }
    }

  </script>
    </head>
    <body>
      <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 ">
          <div id="news">
            
          </div>
        </div>
        <div class="col-lg-4 ">
          <table class="table table-sm table-dark">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Stock</th>
                <th scope="col">Jan</th>
                <th scope="col">Mar</th>
                <th scope="col">Now</th>
              </tr>
            </thead>
            <tbody id="stockRankBody">
            </tbody>
          </table>
        </div>
        <div class="col-lg-4 ">
          <div class="row">
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
                        <span class="glyphicon glyphicon-calendar">
                        </span>
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
              <div class="row">
                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
              </div>
            </div>
          </form>
        </div>
        <div class="row">
          <div id="chartContainer" style="height: 370px;"></div>
        </div>
        </div>
      </div>
    </div>
    </body>
</html>
@endsection
