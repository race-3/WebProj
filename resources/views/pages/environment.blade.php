@extends('layout.master')

@section('content')

<head>
    <meta name="Tyler Race" content="">
    <title>Covid Environmental Effects</title>
</head>

<style>
    .page-header {
        text-align: center;
    }

    hr {
        height: 2px;
        background: black;
    }

    html, body, iframe { height: 100%; }

    [id*='item'] {
        border-radius: 8px;
        padding: 10px;
        background: #F3F3F3;
        -webkit-box-shadow: 0 8px 6px -6px black;
        -moz-box-shadow: 0 8px 6px -6px black;
        box-shadow: 0 8px 6px -6px black;
        margin-top: 20px;
    }

    .tab-content {
        height: 100%;
    }

    .cardTitle {
        text-align: center;
        padding: 5px;
    }

    iframe {
        border: 0;
        left: 0;
        top: 0;
    }

    #mainPageContainer {
        margin-bottom: 20px;
    }

    #linechart1 {
        padding: 20px;
    }

    img {
        max-height: 100%;
        max-width: 100%;
    }

    #item2 {
        height: 65vh;
        display: flex;
        flex-direction: column;
    }
    #item3 {
        height: 65vh;
        display: flex;
        flex-direction: column;
    }

    #nav-tabContent, #nav-china {
        height: 100%;
    }

    #imgContainer img {
        width: 100%;
        height: 200%;
    }

    div[class^="image"] img {
        width: 100%;
        height: auto;
    }

    #trafficHeader {
        font-size: xx-large !important;
    }

    #pageFooter {
        text-align: center;
        font-size: 40pt;
        color: white;
    }

    #footerJumbo {
        background-color: #343a40;
    }

</style>

<body>

<div class="page-header">
    <h1>Environmental Effects of COVID-19</h1>
</div>

<div class="container-fluid" id="mainPageContainer">
    <div class="row">
        <div class="col-lg-6">
            <div id="item1" class="text-center">
                <h4 class="cardTitle">AQI index 2017-2019 around end of year</h4>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle dropdown-toggle-split" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a href="#" class="dropdown-item">Washington</a>
                        <a href="#" class="dropdown-item">Oregon</a>
                        <a href="#" class="dropdown-item">Missouri</a>
                        <a href="#" class="dropdown-item">New York</a>
                        <a href="#" class="dropdown-item">Illinois</a>
                    </div>
                </div>
                <h2 id="loader" style="display: none">LOADING DATA FROM API...</h2>
                <h2 id="errorMsg" style="display: none">ERROR LOADING DATA FROM API...</h2>
                <div id="i1Chart">
                    <canvas id="linechart1"></canvas>
                </div>
                <div id="i1Description">
                    While a general decrease in CO2 is observed in many places, it's not seen everywhere yet.
                    This data unfortunately is somewhat old, and a better idea of the effects of COVID-19 on CO2 emissions
                    would be seen if data was available for 2020. While this data may not illustrate the expected trend,
                    it was chosen because it is from the EPA, and as time goes on, the effects will likel become more apparent.
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div id="item2">
                <h4 class="cardTitle">NO2 Concentrations in Italy</h4>
                <iframe frameborder="0" class="juxtapose" width="100%" height="369.2479674796748" scrolling="no" title="Italy Juxtapose"
                        src="https://cdn.knightlab.com/libs/juxtapose/latest/embed/index.html?uid=7ecb8488-a2bf-11ea-a7cb-0edaf8f81e27"></iframe>
                <div>Credit: NASA</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div id="item3">
                <h4 class="cardTitle">NOx Concentrations in China</h4>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-china-tab" data-toggle="tab" href="#nav-china" role="tab" aria-controls="nav-china" aria-selected="false" onClick="refreshTab2()">China</a>
                        <a class="nav-item nav-link" id="nav-chinaNOX-tab" data-toggle="tab" href="#nav-chinaNOX" role="tab" aria-controls="nav-chinaNOX" aria-selected="false">China NOx</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-china" role="tabpanel" aria-labelledby="nav-china-tab">
                        <iframe frameborder="0" class="juxtapose" width="100%" height="560.871485943775" scrolling="no" title="China Juxtapose"
                                src="https://cdn.knightlab.com/libs/juxtapose/latest/embed/index.html?uid=097fe0ce-a2c0-11ea-a7cb-0edaf8f81e27"></iframe>
                    </div>
                    <div class="tab-pane fade" id="nav-chinaNOX" role="tabpanel" aria-labelledby="nav-chinaNOX-tab">
                        <img src="images/NOx_emission_changes_in_East_China.jpg" alt="China NOx emissions during COVID-19" id="chinaIMG">
                        By Envsciguy - Own work, CC BY-SA 4.0, https://commons.wikimedia.org/w/index.php?curid=89921168
                    </div>
                </div>
                <div id="nasaCredit">Credit: NASA</div>
            </div>
        </div>
        <div class="col-lg-5">
            <div id="item4">
                <h4 class="cardTitle">With the distraction of Covid 19, illegal deforestation has spiked</h4>
                <img src="images/deforestation.jpg" alt="Amazon deforestation August through March 2008 through 2020" id="deforestationImg">
                by Rhett A. Butler on 11 April 2020 "Despite COVID, Amazon deforestation races higher" https://news.mongabay.com/
            </div>
        </div>
        <div class="col-md-3">
            <div id="item5">
                <h3>Stuff</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div id="item9">
                <h4 class="cardTitle" id="trafficHeader">Differences in traffic around the world</h4>
                <div class="container-fluid" id="imgContainer2">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="image1">
                                <img class="image__image" src="https://webassets.tomtom.com/m/fca5824cdb1ffe3/original/Blog-body-image-traffic-data-corona-fig1_1440x850.jpg" alt="Traffic in Milan, January 24, 2020. Before COVID-19 restrictions." width="1440" height="850">
                                <div>Milan, January 24, 2020. Before COVID-19 restrictions.</div>
                                <img class="image__image" src="https://webassets.tomtom.com/m/4c4afc257915a43b/original/Blog-body-image-traffic-data-corona-fig2_1440x850.jpg" alt="Traffic in Milan, April 6, 2020. During COVID-19 restrictions." width="1440" height="850">
                                <div>Milan, April 6, 2020. During COVID-19 restrictions.</div>
                            </div><hr>
                        </div>
                        <div class="col-lg-4">
                            <div class="image2">
                                <img class="image__image" src="https://webassets.tomtom.com/m/c3c1d823c69e8e1/original/Blog-body-image-trafic-data-corona-fig3_1440x850.jpg" alt="Traffic in Rome, January 24, 2020. Before COVID-19 restrictions." width="1440" height="850">
                                <div>Rome, January 24, 2020. Before COVID-19 restrictions.</div>
                                <img class="image__image" src="https://webassets.tomtom.com/m/56b18ad13e6aca06/original/Blog-body-image-traffic-data-corona-fig4_1440x850.jpg" alt="Traffic in Rome, April 6, 2020. During COVID-19 restrictions." width="1440" height="850">
                                <div>Rome, April 6, 2020. During COVID-19 restrictions.</div>
                            </div><hr>
                        </div>
                        <div class="col-lg-4">
                            <div class="image3">
                                <img class="image__image" src="https://webassets.tomtom.com/m/49d80424e577c4d6/original/Blog-body-image-traffic-data-corona-fig5_1440x850.jpg" alt="Traffic in Los Angeles, January 24, 2020. Before COVID-19 restrictions." width="1440" height="850">
                                <div>Los Angeles, January 24, 2020. Before COVID-19 restrictions.</div>
                                <img class="image__image" src="https://webassets.tomtom.com/m/443fc4e50b3d9a/original/Blog-body-image-traffic-data-corona-fig6_1440x850.jpg" alt="Traffic in Los Angeles, April 6, 2020. During COVID-19 restrictions." width="1440" height="850">
                                <div>Los Angeles, April 6, 2020. During COVID-19 restrictions.</div>
                            </div><hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="image4">
                                <img class="image__image" src="https://webassets.tomtom.com/m/4a0f88c907227248/original/Blog-body-image-traffic-data-corona-fig7_1440x850.jpg" alt="Traffic in San Francisco, January 24, 2020. Before COVID-19 restrictions." width="1440" height="850">
                                <div>San Francisco, January 24, 2020. Before COVID-19 restrictions.</div>
                                <img class="image__image" src="https://webassets.tomtom.com/m/4395ef7b1bb93b20/original/Blog-body-image-traffic-data-corona-fig8_1440x850.jpg" alt="Traffic in San Francisco, April 6, 2020. During COVID-19 restrictions." width="1440" height="850">
                                <div>San Francisco, April 6, 2020. During COVID-19 restrictions.</div>
                            </div><hr>
                        </div>
                        <div class="col-lg-4">
                            <div class="image5">
                                <img class="image__image" src="https://webassets.tomtom.com/m/796ff15ab5838ed4/original/Blog-body-image-traffic-data-corona-fig9_1440x850.jpg" alt="Traffic in London, Easter weekend 2019." width="1440" height="850">
                                <div>London, Easter weekend 2019.</div>
                                <img class="image__image" src="https://webassets.tomtom.com/m/225dac3ed8d13ed8/original/Blog-body-image-traffic-data-corona-fig10_1440x850.jpg" alt="Traffic in London, Easter weekend 2020." width="1440" height="850">
                                <div>London, Easter weekend 2020.</div>
                            </div><hr>
                        </div>
                        <div class="col-lg-4">
                            <div class="image6">
                                <img class="image__image" src="https://webassets.tomtom.com/m/7d6d4db44c5fa865/original/Blog-body-image-traffic-data-corona-fig11_1440x850.jpg" alt="Traffic in Birmingham, Easter weekend 2019." width="1440" height="850">
                                <div>Birmingham, Easter weekend 2019.</div>
                                <img class="image__image" src="https://webassets.tomtom.com/m/701709a25944103/original/Blog-body-image-traffic-data-a-corona-fig12_1440x850.jpg" alt="Traffic in Birmingham, Easter weekend 2020." width="1440" height="850">
                                <div>Birmingham, Easter weekend 2020.</div>
                            </div><hr>
                        </div>
                    </div>
                </div>
                </br>
                <div>Source TomTom url: https://www.tomtom.com/blog/moving-world/covid-19-traffic/</div>
            </div>
        </div>
    </div>
</div>

<div class="jumbotron jumbotron-fluid" id="footerJumbo">
    <div class="container" id="pageFooter">As time goes on, we will continue to discover new impacts Covid-19 has had on the environment, both positive and negative.</div>
</div>

<script type="text/javascript">
    let co2_2017_url = 'https://aqs.epa.gov/data/api/sampleData/byState?email=tylerrrace@gmail.com&key=greenmouse56&param=45201&bdate=20170801&edate=20171230&state=';
    let co2_2018_url = 'https://aqs.epa.gov/data/api/sampleData/byState?email=tylerrrace@gmail.com&key=greenmouse56&param=45201&bdate=20180801&edate=20181230&state=';
    let co2_2019_url = 'https://aqs.epa.gov/data/api/sampleData/byState?email=tylerrrace@gmail.com&key=greenmouse56&param=45201&bdate=20190801&edate=20191230&state=';
    let state, built_url1, built_url2, built_url3;

    $(document).ready(function(){
        $(".dropdown-menu a")[0].click();
    });

    $("#nav-chinaNOX-tab").click(function() {
        $("#nasaCredit").hide();
    });

    $("#nav-china-tab").click(function() {
        $("#nasaCredit").show();
    });

    function selectState(state) {
        built_url1 = co2_2018_url + state;
        built_url2 = co2_2019_url + state;
        built_url3 = co2_2017_url + state;
        createChart1();
    }

    $(".dropdown-menu a ").click(function () {
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
            case 'Missouri':
                selectState(29);
                break;
            case 'New York':
                selectState(36);
                break;
            case 'Illinois':
                selectState(17);
                break;
            default:
                break;
        }
    });

    function refreshTab2() {
        $( '#chinaFrame' ).attr( 'src', function ( i, val ) { return val; });
    }

    async function createChart1() {
        $('#linechart1').remove();
        $('#i1Chart').html('<canvas id="linechart1"></canvas>');
        try {
            const data = await getChart1Data();
            const ctx = document.getElementById('linechart1');
            const myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: data.xs,
                    datasets: [{
                        label: '2017 AQI Index in ' + state,
                        data: data.ys3,
                        fill: false,
                        borderColor: 'rgba(234, 152, 0, 1)',
                        borderWidth: 1
                    },
                        {
                            label: '2018 AQI Index in ' + state,
                            data: data.ys,
                            fill: false,
                            borderColor: 'rgba(234, 0, 3, 1)',
                            borderWidth: 1
                        },
                        {
                            label: '2019 AQI Index in ' + state,
                            data: data.ys2,
                            fill: false,
                            borderColor: 'rgba(0, 24, 209, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    elements: {
                        point: {
                            radius: 0
                        }
                    },
                    scales: {
                        yAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: 'Parts per billion of Carbon'
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                callback: function (value, index, values) {
                                    let arr = value.split("-");
                                    return arr[1] + "-" + arr[2];
                                }
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'Date of sample'
                            }
                        }]
                    }
                }
            });
        } catch(error) {
            document.getElementById('errorMsg').style.display = 'block';
            console.log(error);
        }
    }
    async function getChart1Data() {
        const xs =[];
        const ys = [];
        const xs2 =[];
        const ys2 = [];
        const xs3 =[];
        const ys3 = [];

        document.getElementById('errorMsg').style.display = 'none';
        document.getElementById('loader').style.display = 'block';
        const response = await fetch(built_url1);
        const response2 = await fetch(built_url2);
        const response3 = await fetch(built_url3);
        const data = await response.json();
        const data2 = await response2.json();
        const data3 = await response3.json();
        document.getElementById('loader').style.display = 'none';
        data['Data'].forEach(obj => {
            /*
            Object.entries(obj).forEach(([key, value]) => {
                console.log(`${key} ${value}`);
            });*/

            xs.push(obj['date_local']);
            ys.push(parseFloat(obj['sample_measurement']));
        });
        data2['Data'].forEach(obj => {
            /*
            Object.entries(obj).forEach(([key, value]) => {
                console.log(`${key} ${value}`);
            });*/

            xs2.push(obj['date_local']);
            ys2.push(parseFloat(obj['sample_measurement']));
        });
        data3['Data'].forEach(obj => {
            /*
            Object.entries(obj).forEach(([key, value]) => {
                console.log(`${key} ${value}`);
            });*/

            xs3.push(obj['date_local']);
            ys3.push(parseFloat(obj['sample_measurement']));
        });

        return {xs, ys, xs2, ys2, xs3, ys3};
    }

</script>

</body>

@endsection
