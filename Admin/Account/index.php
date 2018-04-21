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
          <a class="navbar-brand" href="index">ANNOUNCEMENT</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index">Home</a></li>
            <li><a href="smslog">SMS Log</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<div class="container" style="margin-top:120px;">
     <?php
               $position = $_SESSION['position'];
               
                        include("button.php");
                       if ($_SESSION['position'] == 'Barangay Secretary' OR $_SESSION['position'] == 'Barangay Captain' OR $_SESSION['position'] == 'Barangay Treasurer') 
                       {
                          
                            $res = mysqli_query($connection, "SELECT * FROM announce ORDER BY date DESC");
                           while ($row = mysqli_fetch_assoc($res))
                           {
               ?>
            <div class="row">
               <div class="box col-sm-12">
                  <div class="col-sm-4">
                     <img class="img-responsive img-border img-left thumbnail" style="background: url(<?php echo $row["image"]?>); background-repeat: no-repeat; background-size:cover; height: 150px; width: 150px;" >
                  </div>
                  <div class="col-sm-8" >
                     <hr>
                     <h2 class="intro-text text-center">
                        <strong><?php echo $row['category'];?></strong>
                     </h2>
                     <hr>
                     <b>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo date("M jS, Y", strtotime($row['date']));?></p>
                     </b>
                     <p><?php echo $row['announcement']; ?></p>
                     <div class="btn-group" >
                        <a class="btn btn-success btn-lg" href="edit.php?id=<?php echo $row['announceId']; ?>"><span class="glyphicon glyphicon-pencil"></span> EDIT</a>
                        <a class="btn btn-danger btn-lg"  href="delete.php?id=<?php echo $row['announceId']; ?>"><span class="glyphicon glyphicon-trash"> DELETE</a>
                     </div>
                  </div>
               </div>
            </div>
            <?php
               }
               
               }
               
               else
               {
               
               $result = mysqli_query($connection, "SELECT * FROM announce");
               while($row = mysqli_fetch_assoc($result))
               {
               
               ?>
              <div class="row">
               <div class="box col-sm-12">
                  <div class="col-sm-4">
                     <img class="img-responsive img-border img-left thumbnail" style="background: url(<?php echo $row["image"]?>); background-repeat: no-repeat; background-size:cover; height: 150px; width: 150px;" >
                  </div>
                  <div class="col-sm-8" >
                     <hr>
                     <h2 class="intro-text text-center">
                        <strong><?php echo $row['category'];?></strong>
                     </h2>
                     <hr>
                     <b>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo date("M jS, Y", strtotime($row['date']));?></p>
                     </b>
                     <p><?php echo $row['announcement']; ?></p>
                    <!--  <div class="btn-group" >
                        <a class="btn btn-success btn-lg" href="edit.php?id=<?php echo $row['announceId']; ?>"><span class="glyphicon glyphicon-pencil"></span> EDIT</a>
                        <a class="btn btn-danger btn-lg"  href="delete.php?id=<?php echo $row['announceId']; ?>"><span class="glyphicon glyphicon-trash"> DELETE</a>
                     </div> -->
                  </div>
               </div>
            </div>
            <?php
               }
               }
               ?>
</div>

<script type="text/javascript">

</script>
</body>
</html>
