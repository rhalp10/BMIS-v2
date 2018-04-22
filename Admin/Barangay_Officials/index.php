<?php
include("../../connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>CHART</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../bootstrap-3.3.7/dist/css/bootstrap.min.css">
    <script src="../../bootstrap-3.3.7/dist/js/jquery-1.12.4.min.js"></script>
    <script src="../../bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
    
    <link rel="shortcut icon" href="../../Img/Icon/indang logo.png">
    <link rel="stylesheet" type="text/css" href="../custom.css">

  <script type="text/javascript" src="../../dhtmlx/diagram/codebase/diagram.js"></script>
  <link rel="stylesheet" href="../../dhtmlx/diagram/codebase/diagram.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">

  <link rel="stylesheet" href="../../dhtmlx/diagram/samples/common/dhx_samples.css">
  <script type="text/javascript" src="../../dhtmlx/diagram/samples/common/data.js"></script>
    <style type="text/css">
      /*Now the CSS*/
* {margin: 0; padding: 0;}
body {
    text-align: center;
  }

    </style>
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
          <a class="navbar-brand" href="index">CHART</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class=""><a href="index">Manage Officials</a></li>
          </ul>
        </div>
      </div>
    </nav>
<div class="container" style="margin-top:120px; ">
  <?php 
$sql =   mysqli_query($conn,"SELECT * FROM `brgy_official_detail` bod 
INNER JOIN resident_detail rd ON rd.res_ID = bod.res_ID
LEFT JOIN ref_suffixname rs ON rs.suffix_ID = rd.suffix_ID
LEFT JOIN ref_position rp ON rp.position_ID = bod.commitee_assignID
WHERE bod. commitee_assignID = 2 AND visibility = 1");
$cap_data = mysqli_fetch_array($sql);
$cap_data['res_Img'];
  ?>
 
  <script>
    var diagram = new dhx.Diagram(document.body, { 
      type: "org",
      defaultShapeType: "img-card",
      scale : 0.8
    });
    diagram.data.parse(bigOrganogramData);
  </script>
</div>



<script type="text/javascript">

</script>
</body>
</html>
