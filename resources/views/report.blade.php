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

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>

<script>

function ShowChart()
{
var fromDate = document.getElementById("sel1");
var strFromDate = fromDate.options[fromDate.selectedIndex].value;
var arrFromDate = strFromDate.split('-');
arrFromDate[2] = "2018";
var startDate = new Date(arrFromDate[2],arrFromDate[1]-1,arrFromDate[0]);


//alert(fromDate.options[fromDate.selectedIndex].value);
var toDate = document.getElementById("sel2");
var strToDate = toDate.options[toDate.selectedIndex].value;
var arrToDate = strToDate.split('-');
arrToDate[2] = "2018";
var endDate = new Date(arrToDate[2],arrToDate[1]-1,arrToDate[0]);



//console.log(endDate);
//console.log(strToDate.toString()); 

//Current Format is dd-mm-yy, however Date() does not take that format.
//	var year = getDates(new Date(fromDate.options[fromDate.selectedIndex].value),new Date(toDate.options[fromDate.selectedIndex].value));


var year = getDates(startDate,endDate);
console.log(year);
        //console.log(year);
    var data_click = <?php echo $date; ?>;

    var data_viewer = <?php echo $date; ?>;


    var barChartData = {

        labels: year,

        datasets: [{

            label: 'Click',

            backgroundColor: "rgba(220,220,220,0.5)",

            data: data_click

        }, {

            label: 'View',

            backgroundColor: "rgba(151,187,205,0.5)",

            data: data_viewer

        }]

    };


        var ctx = document.getElementById("canvas").getContext("2d");

        window.myBar = new Chart(ctx, {

            type: 'bar',

            data: barChartData,

            options: {

                elements: {

                    rectangle: {

                        borderWidth: 2,

                        borderColor: 'rgb(0, 255, 0)',

                        borderSkipped: 'bottom'

                    }

                },

                responsive: true,

                title: {

                    display: true,

                    text: 'Yearly Website Visitor'

                }

            }



    });


}
    function getDates(startDate,stopDate)
    {
    
	    var dateArray = new Array();
	    //console.log(startDate);
	var currentDate = startDate;
	while(currentDate <= stopDate)
	{
  		
		dateArray.push(new Date(currentDate));
        currentDate = addDays(currentDate,1);
		//currentDate = currentDate.addDays(1);
	}
	return dateArray;



    }

function addDays(date, days) {
  var result = new Date(date);
  result.setDate(result.getDate() + days);
  return result;
}


</script>


<div class="container">


                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                    <canvas id="canvas" height="380" width="800"></canvas>

        </div>

    </div>

</div>
    <!--================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>

  </body>
</html>
