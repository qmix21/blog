<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Qmix21 Report</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset("css/app.css")}}" rel="stylesheet">

    <!-- Custom styles for this template -->
</head>

<body class="text-center">
    <h3>Qmix21 Reporting Tool</h3>

    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
        </header>

        <main role="main" class="inner cover">
            <h1 class="cover-heading">Choose Between Two Dates to see Reports</h1>
        </main>
    </div>
    <div class="container">
        <div class="col-sm-8">
            <div class="divider"></div>
            <label>From:</label>
            <select style="display: inline-block;"id="sel1">
    			@foreach($dates as $date)
    			<option>{{ $date->date }}</option>
    			@endforeach
    		</select>
            <div class="divider"></div>
            <label>To:</label>
            <select style="display: inline-block;"id="sel2">
    			@foreach($dates as $date)
    			<option>{{ $date->date }}</option>
    			@endforeach
    		</select>
        </div>
    </div>
    <button onClick="ShowChart()">Show Chart</button>

    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://d3js.org/d3.v4.min.js"></script>
    <script src="{{asset('js/barChart.js')}}"></script>
    <script>


function ShowChart()
{
  var groupChartData = [{ "2614": 8, "over": 1 }, { "2614": 7, "over": 2 }, { "2614": 4, "over": 3 }, { "2614": 19, "over": 4 }, { "2614": 3, "over": 5 }, { "2614": 6, "over": 6 }, { "2614": 7, "over": 7 }, { "2614": 13, "over": 8 }, { "2614": 1, "over": 9 }, { "2614": 8, "over": 10 }];
  var columnsInfo = { "2614": "Team A" };
$("#chart").empty();
var barChartConfig = {
 mainDiv: "#chart",
 colorRange: ["#2a98cd", "#df7247"],
 data: groupChartData,
 columnsInfo: columnsInfo,
 xAxis: "over",
 yAxis: "runs",
 label: {
   xAxis: "Over",
   yAxis: "Runs"
 },
 requireLegend: true
};
var groupChart = new groupBarChart(barChartConfig);
}
    </script>


    <div class="container">


        <div class="panel-heading">Dashboard</div>
        <script>
          window.addEventListener('resize', function (event) {
            $("#chart").width(window.innerWidth * 1.9);
            $("#chart").height(window.innerHeight);
          });
          </script>
        <div id="chart"class="panel-body">


        </div>

    </div>

    </div>
    <!--================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>

</body>

</html>
