<?php
include("../../connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Home - Barangay Management Information System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../bootstrap-3.3.7/dist/css/bootstrap.min.css">
    <script src="../../bootstrap-3.3.7/dist/js/jquery-1.12.4.min.js"></script>
    <script src="../../bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
    
    <link rel="shortcut icon" href="../../Img/Icon/indang logo.png">

  <script src="../../Chart.js/Chart.bundle.js"></script>
  <script src="../../Chart.js/utils.js"></script>
</head>
<body>
       <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index">DASHBOARD</a>
        </div>
      </div>
    </nav>
<div class="container" style="margin-top:120px;">
<canvas id="myChart" width="250" height="250"></canvas>
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["Total Residents",
         "Maternal and Newborn'",
          "Babies",
           "Toddlers",
            "Preschoolers",
             "School Age Children",
              "Tweens",
               "Teenager",
                "Young Adult",
                 "Middle-Aged Adults",
                  "Senior"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3, 2, 3, 2, 3, 2],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(60, 102, 255, 0.2)',
                'rgba(120, 40, 3, 0.2)',
                'rgba(1, 3, 50, 0.2)',
                'rgba(90, 102, 255, 0.2)',
                'rgba(33, 206, 255, 0.2)',
                'rgba(11, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(60, 102, 255, 1)',
                'rgba(120, 40, 3, 0.2)',
                'rgba(1, 3, 50, 0.2)',
                'rgba(90, 102, 255, 0.2)',
                'rgba(33, 206, 255, 0.2)',
                'rgba(11, 102, 255, 0.2)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
</div>

<script type="text/javascript">

</script>
</body>
</html>
