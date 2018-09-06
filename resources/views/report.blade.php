<!doctype html>
    <html lang="en">
        <head>

            <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                    <meta name="description" content="">
                        <meta name="author" content="">
                            <link rel="icon" href="../../../../favicon.ico">

                                <title> Qmix21 Report </title> <!-- Bootstrap core CSS -->
                                        <link href="{{asset("css/app.css ")}}" rel="stylesheet">

                                            <!-- Custom styles for this template -->
                                            <script src="https://code.jquery.com/jquery-latest.min.js" ></script>
                                            <script src="https://d3js.org/d3.v4.min.js" ></script>
                                            <script src="{{asset('js/barChart.js')}}" ></script>
                                                      </head>
                                                      <body class="text-center">
                                                        <script>
                                                        function addDays(date, days) {
                                                            var result = new Date(date);
                                                            result.setDate(result.getDate() + days);
                                                            return result;
                                                        }

                                                        function getDates(startDate, stopDate) {

                                                            var dateArray = new Array();
                                                            //console.log(startDate);
                                                            var currentDate = startDate;
                                                            while (currentDate <= stopDate) {

                                                                dateArray.push(new Date(currentDate));
                                                                currentDate = addDays(currentDate, 1);
                                                                //currentDate = currentDate.addDays(1);
                                                            }
                                                            return dateArray;

                                                        }




                                                        function ShowChart() {

                                                            var fromDate = document.getElementById("sel1");
                                                            var strFromDate = fromDate.options[fromDate.selectedIndex].value;
                                                            var arrFromDate = strFromDate.split('-');
                                                            arrFromDate[2] = "2018";
                                                            var startDate = new Date(arrFromDate[2], arrFromDate[1] - 1, arrFromDate[0]);


                                                            var toDate = document.getElementById("sel2");
                                                            var strToDate = toDate.options[toDate.selectedIndex].value;
                                                            var arrToDate = strToDate.split('-');
                                                            arrToDate[2] = "2018";
                                                            var endDate = new Date(arrToDate[2], arrToDate[1] - 1, arrToDate[0]);

                                                            var dates = getDates(startDate, endDate);

                                                            dates.forEach(function(element) {
                                                                var day = element.getDate();
                                                                var month = element.getMonth();
                                                                var year = element.getFullYear().toString().slice(-2);

                                                                var names = [<?php foreach($names as $name)
                                                                {
                                                                    $arr = [];
                                                                    array_push($arr, $name->name);
                                                                    $js_arr = json_encode($arr);
                                                                    echo $arr;
                                                            } ?>];
                                                              //  console.log(names);
                                                            });
                                                            var groupChartData = [{
                                                                "2614": 8,
                                                                "techs": 1
                                                            }, {
                                                                "2614": 7,
                                                                "techs": 2
                                                            }, {
                                                                "2614": 4,
                                                                "techs": 3
                                                            }, {
                                                                "2614": 19,
                                                                "techs": 4
                                                            }, {
                                                                "2614": 3,
                                                                "techs": 5
                                                            }, {
                                                                "2614": 6,
                                                                "techs": 6
                                                            }, {
                                                                "2614": 7,
                                                                "techs": 7
                                                            }, {
                                                                "2614": 13,
                                                                "techs": 8
                                                            }, {
                                                                "2614": 1,
                                                                "techs": 9
                                                            }, {
                                                                "2614": 8,
                                                                "techs": 10
                                                            }];
                                                            var columnsInfo = {
                                                                "2614": "Team A"
                                                            };

                                                            $("#chart").empty();
                                                            var barChartConfig = {
                                                                mainDiv: "#chart",
                                                                colorRange: ["#2a98cd", "#df7247"],
                                                                data: groupChartData,
                                                                columnsInfo: columnsInfo,
                                                                xAxis: "techs",
                                                                yAxis: "interactions",
                                                                label: {
                                                                    xAxis: "Techs",
                                                                    yAxis: "Interactions"
                                                                },
                                                                requireLegend: true
                                                            };
                                                            var groupChart = new groupBarChart(barChartConfig);
                                                        }


                                         </script>
                                                            <h3> Qmix21 Reporting Tool </h3> <div class="ctechs-container d-flex h-100 p-3 mx-auto flex-column">
                                                                    </header>
                                                                    <main role="main" class="inner ctechs">
                                                                        <h1 class="ctechs-heading"> Choose Between Two Dates to see Reports </h1> </main> </div> <div class="container">
                                                                                <div class="col-sm-8">
                                                                                    <div class="divider">
                                                                                        </div> <label> From: </label>
                                                                                        <select style="display: inline-block;" id="sel1">
                                                                                                @foreach($dates as $date)
                                                                                                <option> {{$date->date}}</option>
                                                                                                 @endforeach
                                                                                                </select>
                                                                                                <div class="divider"></div>
                                                                                                        <label> To: </label>
                                                                                                        <select style="display: inline-block;" id="sel2">
                                                                                                                @foreach($dates as $date)
                                                                                                                <option>
                                                                                                                  {{$date->date}}
                                                                                                                </option>
                                                                                                                 @endforeach </select>
                                                                                                               </div>
                                                                                                              </div>
                                                                                                              <button onclick="ShowChart()"> Show Chart </button>

                                                                                                               <div class="container">
                                                                                                                            <div class="panel-heading"> Dashboard </div>
                                                                                                                             <script>
                                                                                                                                    window.addEventListener('resize', function(event) {
                                                                                                                                    $("#chart").width(window.innerWidth * 0.9);
                                                                                                                                    $("#chart").height(window.innerHeight);
                                                                                                                                    });
                                                                                                                                  </script>
                                                                                                                                    <div id="chart">


                                                                                                                                        </div>
                                                                                                                                       </div>
                                                                                                                                     </div>

<!--================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src = "https://code.jquery.com/jquery-3.2.1.slim.min.js"
integrity = "sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
crossorigin = "anonymous"> </script>
<script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>') </script>

    </body>

    </html>
