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
    <style type="text/css">
      /*Now the CSS*/
* {margin: 0; padding: 0;}

.tree ul {
    padding-top: 20px; position: relative;
  
  transition: all 0.5s;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
}

.tree li {
  float: left; text-align: center;
  list-style-type: none;
  position: relative;
  padding: 20px 5px 0 5px;
  
  transition: all 0.5s;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
}

/*We will use ::before and ::after to draw the connectors*/

.tree li::before, .tree li::after{
  content: '';
  position: absolute; top: 0; right: 50%;
  border-top: 1px solid #ccc;
  width: 50%; height: 20px;
}
.tree li::after{
  right: auto; left: 50%;
  border-left: 1px solid #ccc;
}

/*We need to remove left-right connectors from elements without 
any siblings*/
.tree li:only-child::after, .tree li:only-child::before {
  display: none;
}

/*Remove space from the top of single children*/
.tree li:only-child{ padding-top: 0;}

/*Remove left connector from first child and 
right connector from last child*/
.tree li:first-child::before, .tree li:last-child::after{
  border: 0 none;
}
/*Adding back the vertical connector to the last nodes*/
.tree li:last-child::before{
  border-right: 1px solid #ccc;
  border-radius: 0 5px 0 0;
  -webkit-border-radius: 0 5px 0 0;
  -moz-border-radius: 0 5px 0 0;
}
.tree li:first-child::after{
  border-radius: 5px 0 0 0;
  -webkit-border-radius: 5px 0 0 0;
  -moz-border-radius: 5px 0 0 0;
}

/*Time to add downward connectors from parents*/
.tree ul ul::before{
  content: '';
  position: absolute; top: 0; left: 50%;
  border-left: 1px solid #ccc;
  width: 0; height: 20px;
}

.tree li a{
  border: 1px solid #ccc;
  padding: 5px 10px;
  text-decoration: none;
  color: #666;
  font-family: arial, verdana, tahoma;
  font-size: 11px;
  display: inline-block;
  
  border-radius: 5px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  
  transition: all 0.5s;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
}

/*Time for some hover effects*/
/*We will apply the hover effect the the lineage of the element also*/
.tree li a:hover, .tree li a:hover+ul li a {
  background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
}
/*Connector styles on hover*/
.tree li a:hover+ul li::after, 
.tree li a:hover+ul li::before, 
.tree li a:hover+ul::before, 
.tree li a:hover+ul ul::before{
  border-color:  #94a0b4;
}

/*Thats all. I hope you enjoyed it.
Thanks :)*/
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
      </div>
    </nav>
<div class="container" style="margin-top:120px;">
  <?php 
$sql =   mysqli_query($conn,"SELECT * FROM `brgy_official_detail` bod 
INNER JOIN resident_detail rd ON rd.res_ID = bod.res_ID
LEFT JOIN ref_suffixname rs ON rs.suffix_ID = rd.suffix_ID
LEFT JOIN ref_position rp ON rp.position_ID = bod.commitee_assignID
WHERE bod. commitee_assignID = 2 AND visibility = 1");
$cap_data = mysqli_fetch_array($sql);
$cap_data['res_Img'];
  ?>
 <div class="tree">
    <ul>
    <li>
      <a href="#">
        <?php 
        if (isset($cap_data['res_Img'])) {
            $cap_img  = $cap_data['res_Img'];
            ?>
            <img src="data:image/jpeg;base64,<?php echo base64_encode($cap_img) ?>" width="250" height="250" class="img-circle"/>
            <?php
        } 
        else{
          ?>
          <img src="../Img/Icon/imgdefault.png" width="250" height="250" class="img-circle" >
          <?php
        }
        ?>
        <h4> <?php 
         $suffix = $cap_data['suffix'];
          if ($suffix == "N/A") {
            $suffix = "";
          }
          else{
             $suffix = $cap_data['suffix'];
          }
        echo $cap_data['res_fName']." ".$cap_data['res_mName']." ".$cap_data['res_lName']." ".$suffix ?></h4>
        <h4><Strong>Barangay Captain</Strong></h4>
      </a>
      <ul>
        <li>
          <a href="#">Child</a>
          <ul>
            <li>
              <a href="#">Grand Child</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#">Barnagay Official</a>
          <ul>
            <li><a href="#">Grand Child</a></li>
            <li>
              <a href="#">Grand Child</a>
              <ul>
                <li>
                  <a href="#">Great Grand Child</a>
                </li>
                <li>
                  <a href="#">Great Grand Child</a>
                </li>
                <li>
                  <a href="#">Great Grand Child</a>
                </li>
              </ul>
            </li>
            <li><a href="#">Grand Child</a></li>
          </ul>
        </li>

        <li>
          <a href="#">Child</a>
          <ul>
            <li>
              <a href="#">Grand Child</a>
            </li>
          </ul>
        </li>
      </ul>
    </li>
  </ul>
</div>
</div>



<script type="text/javascript">

</script>
</body>
</html>
