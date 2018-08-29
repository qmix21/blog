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
    		<select style="display: inline-block;">
    			@foreach($dates as $date)
    			<option>{{ $date->date }}</option>
    			@endforeach
    		</select>
    		<div class="divider"></div>
    		<label>To:</label>
    		<select style="display: inline-block;">
    			@foreach($dates as $date)
    			<option>{{ $date->date }}</option>
    			@endforeach
    		</select>
    	</div>
    </div>

<script src="https://raw.githubusercontent.com/nnnick/Chart.js/master/dist/Chart.bundle.js"></script>

<script>

    var year = ['2013','2014','2015', '2016'];

    var data_click = <?php echo $click; ?>;

    var data_viewer = <?php echo $viewer; ?>;


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


    window.onload = function() {

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


    };

</script>


<div class="container">

    <div class="row">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">

                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                    <canvas id="canvas" height="280" width="600"></canvas>

                </div>

            </div>

        </div>

    </div>

</div>
    <!--================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>

  </body>
</html>
