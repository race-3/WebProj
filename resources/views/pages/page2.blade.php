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
            body{
              background: #111;
              overflow-x: hidden;
            }
            #chartContainer{
              height: 370px;
              width: 90%;
            }
            .card-title{
              color: blue;
              font-family: 'Helvetica Neue', sans-serif;
              font-size: 12px;
              font-weight: 900;
              letter-spacing: -1px;
              line-height: 1;
              text-align: left;
            }
            .card-text{
              color: #111; 
              font-family: 'Lato', sans-serif; 
              font-size: 4px; 
              font-weight: 300; 
              text-align: left;
            }
            .card{
              margin: 0px 3px 3px 3px;
            }
            .card:hover{
              margin-right: -1px;
              margin-top: -1px;
            }
            .newsrow{
              margin-left: 20px;
            }
            .carousel-control-next{
              right:-30px;
            }
            .carousel-control-prev{
              left:-35px;
            }
            input[type="submit"]{
              color: white;
              margin-left: 15px;
              margin-bottom: 25px;
            }
            .carousel-indicators{
              top: 30px;
            }
            h2{
              margin-bottom: 25px;
              font-weight: 200;

            }
            .news-title{
              color: #f2f2f2;
              background: #ff4a4a; 
              line-height: 37px; 
              font-weight: 700; 
              padding: 10px;
              margin-top:0px; 
              font-family: 'Libre Baskerville', serif;
            }
            .stocks-title{
              color: #f2f2f2;
              font-family: 'Lobster', cursive; 
              background: #4a4aff;
              text-transform: uppercase;
              line-height: 37px; 
              padding: 10px;
              margin: 0 0 24px;
            }
        </style>

  <script type="text/javascript">
    var dataPoints = [];
    var chart;
    var stockName;
    var theStock;
    var oanda = [];
    var newsCount = 0;
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
      // loadStock(times[0] ,curDate,$('#sym').val()).then(function(){loadCandle(theStock);});

      // for (var i = someStocks.length - 1; i >= 0; i--) {
      //   loadRanking(i);
      // }

      // getLastestNews();
      // for (var i = someStocks.length - 1; i >= 0; i--) {
      //   getCompanyNews(i);  
      // }
      getForexSym();
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
          generateNewsCard(dat);
        }
      );
      return data;
    }

    function generateNewsCard(data){
      var headline, summary;
      var page = Math.floor(newsCount/9);
      for (var i = 0; i < data.length; i++) {
        while(page >= $(".carousel-item").length){
          $(".carousel-inner").append("<div class='carousel-item'><div class='row newsrow'></div></div>");
          $(".carousel-indicators").append("<li data-target='#carouselExampleIndicators' data-slide-to='"
            +page
            +"'></li>");
        }

        headline = data[i]["headline"].toLowerCase();
        summary = data[i]["summary"].toLowerCase();

        if(headline.includes("corona") || headline.includes("covid") || summary.includes("corona") || summary.includes("covid")){
          $($('.newsrow')[page]).append("<a href="
            +data[i]["url"]
            +"><div class='card' style='width: 18rem;'><img class='card-img-top' src="
            +data[i]["image"]
            +" alt='Card image cap'><div class='card-body'><h5 class='card-title'>"
            +data[i]["headline"]
            +"</h5><p class='card-text'>"
            +data[i]["summary"].slice(0,100)
            +"...</p>"
            +" class='btn btn-primary'>Click to View</div></div></a>"
          );
          newsCount++;
          page = Math.floor(newsCount /9);
        }
      }
    }

    function getForexSym(){
      var data = $.getJSON("https://finnhub.io/api/v1/forex/symbol?exchange=oanda&token={{$api_key}}",
        function(dat){
          for (var i = dat.length - 1; i >= 0; i--) {
            if(dat[i]["description"].includes("USD"))
              oanda.push(dat[i]["symbol"].slice(6));
          }
          console.log(oanda);
          loadForexGraphs();
        }
      );
      return data;
    }

    function loadForexGraphs(){
      if (oanda.length > 0) {
        for (var i = 0; i < oanda.length -1; i++) {
          getForex(i);
        }
      }
    }

    function getForex(i){

              console.log("starting "+oanda[i]);
      var success = $.getJSON("https://finnhub.io/api/v1/forex/candle?symbol=OANDA:"
            +oanda[i]
            +"&resolution=D&from="
            +times[0]
            +"&to="
            +curDate
            +"&token={{$api_key}}",
            function(data){
              if (data['s'] == "ok") {
                loadForexGraph(data, i);
              }else{
                console.log("Error: failed to load forex "+oanda[i]);
              }
            }
      );
      return success;
    }

    function loadForexGraph(data, j){
      var points = [];
      for (var i = 0; i < data["c"].length;i++) {
        points.push({
          x: new Date(
              data['t'][i] * 1000
          ),
          y: parseFloat(data['c'][i])
        });             
      }
      $('#forex').append("<div id='chartContainer"+j+"' style='height: 120px; width: 10%;'></div>");
      graph = new CanvasJS.Chart("chartContainer"+j, {
        animationEnabled: true,
        theme: "dark1",
        title:{
          text: oanda[j]
        },
        axisY:{
          includeZero: false
        },
        data: [{        
          type: "line",
              indexLabelFontSize: 16,
          dataPoints: points
        }]
      });
      graph.render();
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
            <h2 class="news-title">Stock Related Corona Virus News</h2>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class='row newsrow'>
                  </div>
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 ">
          <div class="row">
            <div id="forex"></div>
          </div>
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
          <h2 class="stocks-title">Display Graph for stock</h2>
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
                <input type="submit" name="submit" value="Display Graph" class="btn btn-primary">
              </div>
            </div>
          </form>
        </div>
        <div class="row">
          <br>
          <div id="chartContainer"></div>
        </div>
        </div>
      </div>
    </div>
    </body>
</html>
@endsection
