<html>
<body>
  <script>
    window.addEventListener('resize', function (event) {
      $("#chart").width(window.innerWidth * 0.9);
      $("#chart").height(window.innerHeight);
    });
  </script>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="https://d3js.org/d3.v4.min.js"></script>
<script src="barChart.js"></script>
<div id="chart" style="width: 800;height: 500">
</div>
<a href="https://stackoverflow.com/users/7430694/chandrakant-thakkar" style="position: absolute;top: 6%;left: 75%;" target="_blank">
<img src="https://stackoverflow.com/users/flair/7430694.png" width="208" height="58" alt="profile for Chandrakant Thakkar at Stack Overflow, Q&amp;A for professional and enthusiast programmers" title="profile for Chandrakant Thakkar at Stack Overflow, Q&amp;A for professional and enthusiast programmers">
</a>
<script>
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
</script>

</body>
</html>
