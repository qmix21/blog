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



                                                        function isNumeric(n) {
                                                          return !isNaN(parseFloat(n)) && isFinite(n);
                                                        }
                                                        function ShowChart() {
                                                          //Get Date from option 1 and put it into Date object

                                                            var fromDate = document.getElementById("sel1");
                                                            var strFromDate = fromDate.options[fromDate.selectedIndex].value;
                                                            var arrFromDate = strFromDate.split('-');
                                                            arrFromDate[2] = "2018";
                                                            var startDate = new Date(arrFromDate[2], arrFromDate[1] - 1, arrFromDate[0]);

                                                            //Get Date from option 2 and put it into Date object
                                                            var toDate = document.getElementById("sel2");
                                                            var strToDate = toDate.options[toDate.selectedIndex].value;
                                                            var arrToDate = strToDate.split('-');
                                                            arrToDate[2] = "2018";
                                                            var endDate = new Date(arrToDate[2], arrToDate[1] - 1, arrToDate[0]);

                                                            var dates = getDates(startDate, endDate);

                                                            var names = <?php
                                                            $arr = [];
                                                            foreach ($names as $name) {

                                                                array_push($arr, $name->name);
                                                            }
                                                        $js_arr = json_encode($arr);
                                                        echo $js_arr;?>;

                                                        var users = <?php
                                                            $userArr = [];
                                                            foreach ($users as $user){
                                                              array_push($userArr, $user);
                                                            }
                                                            $js_usr = json_encode($userArr);
                                                            echo $js_usr;
                                                            ?>

                                                            var groupChartData = [];
                                                            var userData = [];
                                                            var userGroupData = [];
                                                            dates.forEach(function(element) {


                                                                var day = element.getDate();
                                                                var month = element.getMonth();
                                                                if(month != 10 || month != 11 || month != 12)
                                                                {
                                                                  month = '0'+month;
                                                                }
                                                                var year = element.getFullYear().toString().slice(-2);
                                                                var complete_Date = day + '-' + month + '-'+ year;
                                                              //  console.log(complete_Date);

                                                                users.forEach(function(element){
                                                                //  console.log(element.name)
                                                                var matches = element.name.match(/\d+/g);
                                                                  if(matches!=null){
                                                                  //  console.log(element.name);
                                                                  }
                                                                  else {
                                                                //console.log(element.date);
                                                                    if(element.date == complete_Date)
                                                                    {
                                                                    //Foreach

                                                                        data = {'name':element.name,"interactions":element.perhour};
                                                                        //console.log(data);
                                                                        userData.push(data);

                                                                    }
                                                                    else {

                                                                    //  console.log(complete_Date);
                                                                  }
                                                                  //  console.log(userData);
                                                                  }

                                                                });


                                                            });

                                                            //console.log(userData);
                                                          //  console.log(users);

                                                              for(i = 0; i<userData.length-1;i++)
                                                              {
                                                                  var duplicate = false;
                                                                  var xarr = 0;
                                                                  var iarr =0;
                                                                  for(x =0;x<userGroupData.length-1;x++)
                                                                  {
                                                                    if(userGroupData[x].name == userData[i].name)
                                                                    {
                                                                      duplicate = true;
                                                                      xarr = x;
                                                                      iarr = i;
                                                                      break;
                                                                      }
                                                                    else {

                                                                    }
                                                                  }
                                                                  if(duplicate)
                                                                  {
                                                                    userGroupData[xarr].interactions = userGroupData[xarr].interactions + userData[iarr].interactions;
                                                                  }
                                                                  else {
                                                                    userGroupData.push(userData[i]);
                                                                  }

                                                              }
                                                              //console.log(userGroupData);


                                                            userGroupData.forEach(function(element){
                                                            //  console.log(element.name);

                                                              var data = {"2614":element.interactions,"techs":element.name};

                                                              groupChartData.push(data);
                                                            //  console.log(groupChartData);

                                                            });
                                                            //console.log(groupChartData);
                                                          //  var groupChartData = [
                                                            //  {
                                                              //  "2614": 8,
                                                                //"techs": 1
                                                            //}, {
                                                              //  "2614": 7,
                                                                //"techs": 2
                                                            //}, {
                                                            //    "2614": 4,
                                                            //    "techs": 3
                                                            //}, {
                                                              //  "2614": 19,
                                                                //"techs": 4
                                                            //}, {
                                                              //  "2614": 3,
                                                                //"techs": 5
                                                            //}, {
                                                              //  "2614": 6,
                                                                //"techs": 6
                                                            //}, {
                                                            //    "2614": 7,
                                                            //    "techs": 7
                                                          //}, {
                                                            //    "2614": 13,
                                                            //    "techs": 8
                                                            //}, {
                                                            //    "2614": 1,
                                                            //    "techs": 9
                                                            //}, {
                                                            //    "2614": 8,
                                                            //    "techs": 10
                                                          //}];
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
                                                                                                              <div class="container">
                                                                                                              <button onclick="ShowChart()"> Show Chart </button>
                                                                                                            </div>

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
