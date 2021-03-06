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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Stocks</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            body{
              background: #111;
              overflow-x: hidden;
            }
            #title{
              font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
              height: 46px;
              line-height: 36px;
              margin-right: 16px;
              padding: 5px 0px 5px 0px;
            }
            .navbar-nav{
              font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
              font-size: 16px;
              font-weight: 400;
            }
            .nav-item{
              padding: 8px;
            }
            .navbar-collapse{
              padding: 0px;
            }
            #chartContainer{
              height: 370px;
              width: 90%;
            }
            .card-title{
              color: blue;
              font-size: 12px;
              font-weight: 900;
              letter-spacing: -1px;
              line-height: 1;
              text-align: left;
            }
            .card-text{
              color: #111; 
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
              top: -15px;
              height: 20px;
              max-height: 20px;
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
            }
            .stocks-title{
              color: #f2f2f2;
              background: #4a4aff;
              line-height: 37px; 
              padding: 10px;
              margin: 0 0 24px;
            }
            .forex-chart{
              height: 120px;
              width: 600px;
              margin: 0px 25px 10px 25px;
              text-align: center;
            }
            .forex-title{
              color: #f2f2f2;
              background: #4a4a4a;
              line-height: 37px; 
              padding: 10px 30px 10px 30px;
              margin: 20px 0px 4px;
              max-height: 57px;
            }
            #forex{
              height: 360px;
              max-height: 360px;
              overflow-y: scroll;
              max-width: 600px;
            }
            #sym{
              max-width: 40%;
              margin:0px 15px 0px 15px;
            }
            #sym2{
              max-width: 40%;
              margin-right:5px;
            }
            iframe, .modal-body{
              width: 100%;
              height:600px;
            }
            @media only screen and (max-width: 650px) {
              .card{
                max-width: 150px;
              }
              .forex-chart{
                height: 100px;
                width: 400px;
              }
            }
        </style>

  <script type="text/javascript">
    var chart;
    var stockName;
    var oanda = [];
    var newsCount = 0;
    var today = new Date();
    var curDate = Math.round(today.getTime() / 1000);
    var box2Holder = "MSFT";
    var times = [1577865651,1580603364 ,1583108964,1585783779,1588375764,1591054179]; //by month
    var someStocks =[["Apple","AAPL"],["Ford","F"],["Disney","DIS"],["American Airlines","AAL"],["Microsoft","MSFT"],["Bank of America","BAC"],["Tesla","TSLA"],["Uber","UBER"],["Starbucks","SBUX"],["AT&T","T"]];

    $(function() {
      $('#datetimepicker1').datetimepicker();
      $("#datetimepicker2box").val(today);
      $('#datetimepicker2').datetimepicker();
      
      $('#sym').val("AAPL");
      loadChartStartup();

      setTimeout(function(){
        for (var i = someStocks.length - 1; i >= 0; i--) {
          loadRanking(i);
        }
      },800);

      setTimeout(function(){
        getLastestNews().then(data =>{generateNewsCard(data)});
        for (var i = someStocks.length - 1; i >= 0; i--) {
          getCompanyNews(i).then(data =>{generateNewsCard(data)});
        }
      },1200);

      setTimeout(function(){
        getForexSym();
      },2000);
    });  

    async function loadChartStartup(){
      var stock1 = $('#sym').val();
      var stock2 = $('#sym2').val();
      var first = await loadStock(times[0] ,curDate,stock1);
      if(stock2 != ""){
        var second =  await loadStock(times[0],curDate,stock2);
        var loading = await loadCandle(first, second, stock1, stock2);
      }else{
        var loading = await loadCandle(first, false, stock1, false);
      }
    }

    function toogleDataSeries(e) {
      if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
        e.dataSeries.visible = false;
      } else {
        e.dataSeries.visible = true;
      }
      e.chart.render();
    }

    async function getUnixDate() {
      var date1 = $('#datetimepicker1').data("DateTimePicker").date();
      var date2 = $('#datetimepicker2').data("DateTimePicker").date();
      var sym = $('#sym').val();
      var sym2 = $('#sym2').val();
      if( date1 && date2 ){
        date1 = date1.unix();
        date2 = date2.unix();
        if (date2 > date1 && date2 <= curDate){
          var data1 = await loadStock(date1,date2,sym);
          if(sym2 != ""){
            var data2 = await loadStock(date1,date2,sym2);
            await loadCandle(data1,data2, sym, sym2);
          }else{
            await loadCandle(data1,false, sym, false);
          }
        }else{
          alert("Second date has to be after the first.");
        }
      }
    }

    async function loadStock(start, end, sym){
      var data = await fetch("https://finnhub.io/api/v1/stock/candle?symbol="+sym.toUpperCase()+"&resolution=1&from="+start+"&to="+end+"&token={{$api_key}}");
      var blob = await data.json();
      return blob;
    }

    function loadRanking(num){
      loadStock(times[0],times[times.length-1],someStocks[num][1]).then(value =>{
        if (value['s'] == "ok") {
          var stock = [value['c'][0],value['c'][Math.round(value['c'].length/2)],value['c'][value['c'].length-1]];
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
            +someStocks[num][0]
            +"</th><td>"
            +someStocks[num][1]
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

    async function getCompanyNews(i){
      var todayDate = today.getFullYear() + '-' + today.getMonth() + '-' + today.getDate();
      var data = await fetch("https://finnhub.io/api/v1/company-news?symbol="+someStocks[i][1]+"&from=2020-01-01&to="+todayDate+"&token={{$api_key}}");
      var response = await data.json();
      return response;
    }

    async function getLastestNews (){
      var data = await fetch("https://finnhub.io/api/v1/news?category=general&token={{$api_key}}");
      var response = await data.json();
      return response;
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

        if((headline.includes("corona") || headline.includes("covid") || summary.includes("corona") || summary.includes("covid")) && ($(".card-title:contains('"+data[i]["headline"]+"')").length ==0 )){
          $($('.newsrow')[page]).append("<div class='card' style='width: 18rem;'><img class='card-img-top' src='"
            +data[i]["image"]
            +"'><div class='card-body'><h5 class='card-title'>"
            +data[i]["headline"]
            +"</h5><p class='card-text'>"
            +data[i]["summary"].slice(0,100)
            +"...</p>"
            +"<button data-toggle='modal' data-target='#myModal' onclick=loadModal('"
            +data[i]["url"]
            +"','"
            +data[i]["headline"].split(' ').join('_')
            +"') class='btn btn-primary'>Click to Preview</button></div></div>"
          );
          newsCount++;
          page = Math.floor(newsCount /9);
        }
      }
    }

    function loadModal(link, header){
      $("#modal-title").text(header.split('_').join(' '));
      $("#modal-link").attr("href",link);
      $("#modal-iframe").attr("src",link);
    }

    function getForexSym(){
      var data = $.getJSON("https://finnhub.io/api/v1/forex/symbol?exchange=oanda&token={{$api_key}}",
        function(dat){
          for (var i = dat.length - 1; i >= 0; i--) {
            if(dat[i]["description"].includes("USD"))
              oanda.push(dat[i]["symbol"].slice(6));
          }
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
      $('#forex').append("<div id='chartContainer"+j+"' class='forex-chart'></div>");
      graph = new CanvasJS.Chart("chartContainer"+j, {
        animationEnabled: true,
        theme: "dark1",
        title:{
          text: oanda[j].replace("_","/")
        },
        axisY:{
          includeZero: false
        },
        axisX: {
          interval: 1,
          valueFormatString: "MMM"
        },
        data: [{        
          type: "line",
              indexLabelFontSize: 16,
          dataPoints: points
        }]
      });
      graph.render();
    }

    function oneStockTwoStock(){
      var toggle = $("#sym2");
      if(toggle.hasClass("d-none")){
        toggle.removeClass('d-none');
        toggle.val(box2Holder);
        $("#toggleTwo").removeClass("fa-plus").removeClass("btn-primary").addClass("fa-minus").addClass("btn-danger");
      }else{
        box2Holder = toggle.val();
        toggle.addClass('d-none');
        $("#toggleTwo").removeClass("fa-minus").removeClass("btn-danger").addClass("fa-plus").addClass("btn-primary");
      }
    }

    async function newOnBoard(stock){
      var data = await fetch("https://finnhub.io/api/v1/stock/symbol?exchange=US&token={{$api_key}}");
      var blob = await data.json();
      var name = false;
      for (var i = blob.length - 1; i >= 0; i--) {
        if(blob[i]["symbol"] == stock){
          name = blob[i]["description"];
        }
      }
      var exists = false;
      for (var i = someStocks.length - 1; i >= 0; i--) {
        if(someStocks[i][1] == stock)
          exists = true;
      }
      if(name && !exists){
        someStocks.push([name,stock]);
        loadRanking(someStocks.length-1);
      }
    }

    async function loadCandle(data1, data2, sym1, sym2) {
      var data = [data1,data2];
      var dataPoints = [[],[]];
      if(data[0]['s'] == "ok" && !data[1]){
        await newOnBoard(sym1);
        for (var i = 0; i < data[0]['c'].length; i++) {
          dataPoints[0].push({
            x: new Date(
                data[0]['t'][i] * 1000
            ),
            y: [
              parseFloat(data[0]['o'][i]),
              parseFloat(data[0]['h'][i]),
              parseFloat(data[0]['l'][i]),
              parseFloat(data[0]['c'][i])
            ]
          });
        }
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
            dataPoints: dataPoints[0]
          }]
        });
        chart.render();
      }else if (data[0]['s'] == "ok" && data[1]['s'] == "ok") {
        await newOnBoard(sym1);
        await newOnBoard(sym2);
        for (var num = 0; num != 2; num++){
          for (var i = 0; i < data[num]['c'].length; i++) {
            dataPoints[num].push({
              x: new Date(
                  data[num]['t'][i] * 1000
              ),
              y: [
                parseFloat(data[num]['o'][i]),
                parseFloat(data[num]['h'][i]),
                parseFloat(data[num]['l'][i]),
                parseFloat(data[num]['c'][i])
              ]
            });
          }
        }
        chart = new CanvasJS.Chart("chartContainer", {
          animationEnabled: true,
          theme: "dark1",
          exportEnabled: true,
          title:{
            text: sym1 +" vs " + sym2
          },
          axisX: {
            valueFormatString: "MMM DD HH:00"
          },
          axisY: {
            includeZero:false, 
            prefix: "$",
            title: "Price (in USD)"
          },
          toolTip: {
            shared: true
          },
          legend: {
            cursor: "pointer",
            itemclick: toogleDataSeries
          },
          toolTip: {
            content: "Date: {x}<br /><strong>Price:</strong><br />Open: {y[0]}, Close: {y[3]}<br />High: {y[1]}, Low: {y[2]}",
            shared: true
          },
          data: [{
            type: "candlestick",
            showInLegend: true,
            name: sym1,
            yValueFormatString: "$###0.00",
            xValueFormatString: "MMMM YY",
            dataPoints: dataPoints[0]
          },
          {
            type: "candlestick",
            showInLegend: true,
            name: sym2,
            yValueFormatString: "$###0.00",
            dataPoints: dataPoints[1]
          }]
        });
        chart.render();
      }else {
        console.log("Error Rendering Chart");
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
          <table class="table table-sm table-dark">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Stock</th>
                <th scope="col">Before Lockdown</th>
                <th scope="col">Mid Lockdown</th>
                <th scope="col">Now</th>
              </tr>
            </thead>
            <tbody id="stockRankBody">
            </tbody>
          </table>
          <div class="row">
            <div id="forex" class="row d-flex justify-content-center">
              <h2 class="forex-title">USD Exchange Rates</h2>
            </div>
          </div>
        </div>
        <div class="col-lg-4 ">
          <h2 class="stocks-title">Display Graph of a Stock</h2>
          <div class="row">
          <form  onsubmit="getUnixDate();return false">
            <div class="container">
              <div class="row">
                <div class='col-sm-6'>
                  <div class="form-group">
                    <div class="row form-group input-group">
                      <input type="text" name="symbol" id="sym" class="form-control">
                      <i id="toggleTwo" class="fa btn btn-primary fa-plus" onclick="oneStockTwoStock()"></i>
                      <input type="text" name="symbol2" id="sym2" class="form-control d-none">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class='col-sm-6'>
                  <div class="form-group">
                    <div class='input-group date' id='datetimepicker1'>
                      <input type='text' class="form-control" name="datetimepicker1" id='datetimepicker1box' value="01/01/2020" />
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
                      <input type='text' class="form-control" name="datetimepicker2" id='datetimepicker2box' />
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
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="modal-title"></h4>
          </div>
          <div class="modal-body">
              <iframe id="modal-iframe" src="" frameborder="0" allowtransparency="true"></iframe>  
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <a id="modal-link" href=""><button type="button" class="btn btn-primary">Go to Link</button></a>
          </div>
        </div>
      </div>
    </div>
    </body>
</html>
@endsection
