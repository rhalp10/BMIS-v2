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
    <link rel="stylesheet" type="text/css" href="../../DataTables/datatables.min.css"/>
    <script type="text/javascript" src="../../DataTables/datatables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../custom.css">
   
</head>
<body >

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
          <a class="navbar-brand" href="index">RESIDENT PROFILLING</a>
        </div>
        <!--/.nav-collapse -->
      </div>
    </nav>
<div class="container" style="margin-top:120px;">
  <?php 

  
$sql = mysqli_query($conn,"SELECT res_ID,res_fName,res_mName,res_lName,rs.suffix,rms.marital_Name,rg.gender_Name,rr.religion_Name,ro.occupation_Name,ros.occuStat_Name,res_Date_Record,rc.country_citizenship,res_Bday,TIMESTAMPDIFF(YEAR,res_Bday,CURDATE()) AS age,
(case  
 when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=1) then 'Maternal and Newborn'
 when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=1 and TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=12) then 'Babies'
when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=13 and TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=24) then 'Toddlers'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=2 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=4) then 'Preschoolers'
 when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=5 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=8) then 'School Age Children'
 when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=9 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=12) then 'Tweens '
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=13 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=19) then 'Teenager'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=20 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=35) then 'Young Adult'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=36 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=55) then 'Middle-Aged Adults'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=56 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=100) then 'Senior'
   end) Age_Stage
FROM resident_detail rd 
LEFT JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID 
LEFT JOIN ref_gender rg ON rd.gender_ID = rg.gender_ID
LEFT JOIN ref_marital_status rms ON rms.marital_ID = rd.marital_ID
LEFT JOIN ref_religion rr ON rr.religion_ID = rd.religion_ID 
LEFT JOIN ref_occupation ro ON ro.occupation_ID = rd.occupation_ID 
LEFT JOIN ref_occupation_status ros ON ros.occuStat_ID = rd.occuStat_ID
LEFT JOIN ref_country rc ON rc.country_ID = rd.country_ID");

?>
<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#print">PRINT</button>
<br><br>
      <table class="table table-bordered " id="accounts">
        <thead class="bg-primary">
          <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Stage</th>
            <th>Sex</th>
            <th>Citizenship</th>
            <th>Occupation</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody >
          <?php 
          while ($res_data = mysqli_fetch_array($sql)) {
            $suffix = $res_data['suffix'];
            if ($suffix == "N/A") {
              $suffix = "";
            }
            else{
               $suffix = $res_data['suffix'];
            }
           ?>
           <tr>
            <td><?php echo $res_data['res_fName']." ".$res_data['res_mName'].". ".$res_data['res_lName']." ".$suffix ?></td>
            <td><?php echo $res_data['age'] ?></td>
            <td><?php echo $res_data['Age_Stage'] ?></td>
            <td><?php echo $res_data['gender_Name'] ?></td>
            <td><?php echo $res_data['country_citizenship'] ?></td>
            <td><?php echo $res_data['occupation_Name'] ?></td>
            <td>
              <div class="btn-group">
                <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-cog"></span></button>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">View</a></li>
                  <li><a href="#">Edit</a></li>
                  <li><a href="#">Delete</a></li>
                </ul>
              </div>
            </td>
          </tr>
           <?php
          }
          ?>
          
        </tbody>
      </table>
</div>

<script type="text/javascript">
$(document).ready( function () {
    $('#accounts').DataTable();
} );
</script>
</body>
</html>



<!-- Modal -->
<div id="print" class="modal fade" role="dialog">
   <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">GENERATE RESIDENT REPORTS</h4>
         </div>
         <div class="modal-body">
            <form action="resident-export.php" target="_blank" method="POST">
               <div class="modal-body">
                  <div class="form-group">
                     <div class="row">
                        <div class="col-sm-6  text-center">
                           <h1>All list of resident</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(../../Img/Icon/Resident.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <!-- <a href="resident-export.php?report=all" class="btn btn-primary btn-sm legitRipple" target="_blank">PRINT</a> -->
                           <div class="btn-group">
                              <button type="submit" name="resident" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="residentpdf" class="btn btn-danger btn-xs">Pdf</button>
                           </div>
                        </div>
                        <div class="col-sm-6  text-center">
                           <h1>Male Resident</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(../../Img/Icon/Male.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <div class="btn-group">
                              <button type="submit" name="male" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="malepdf" class="btn btn-danger btn-xs">Pdf</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                        <div class="col-sm-6  text-center">
                           <h1>Female Resident</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(../../Img/Icon/Female.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <div class="btn-group">
                              <button type="submit" name="female" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="femalepdf" class="btn btn-danger btn-xs">Pdf</button>
                           </div>
                        </div>
                        <div class="col-sm-6  text-center">
                           <h1>Infant</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(../../Img/Icon/Infant.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <div class="btn-group">
                              <button type="submit" name="Infant" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="Infantpdf" class="btn btn-danger btn-xs">Pdf</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                        <div class="col-sm-6  text-center">
                           <h1>Minor</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(../../Img/Icon/Minor.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <div class="btn-group">
                              <button type="submit" name="Minor" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="Minorpdf" class="btn btn-danger btn-xs">Pdf</button>
                           </div>
                        </div>
                        <div class="col-sm-6  text-center">
                           <h1>Teenager</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(../../Img/Icon/Teen.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <div class="btn-group">
                              <button type="submit" name="Teen" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="Teenpdf" class="btn btn-danger btn-xs">Pdf</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                        <div class="col-sm-6  text-center">
                           <h1>Adult</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(../../Img/Icon/Adult.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <div class="btn-group">
                              <button type="submit" name="Adult" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="Adultpdf" class="btn btn-danger btn-xs">Pdf</button>
                           </div>
                        </div>
                        <div class="col-sm-6  text-center">
                           <h1>Senior Citizen</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(../../Img/Icon/Senior.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <div class="btn-group">
                              <button type="submit" name="Senior" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="Seniorpdf" class="btn btn-danger btn-xs">Pdf</button>
                              
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                        <div class="col-sm-6  text-center">
                           <h1>Employed</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(../../Img/Icon/Employed.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <div class="btn-group">
                              <button type="submit" name="employed" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="employedpdf" class="btn btn-danger btn-xs">Pdf</button>
                              
                           </div>
                        </div>
                        <div class="col-sm-6  text-center">
                           <h1>Unemployed</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(../../Img/Icon/Unemployed.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <div class="btn-group">
                              <button type="submit" name="unemployed" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="unemployedpdf" class="btn btn-danger btn-xs">Pdf</button>
                              
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                        <div class="col-sm-6  text-center">
                           <h1>Death</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(../../Img/Icon/Death.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <div class="btn-group">
                              <button type="submit" name="death" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="deathpdf" class="btn btn-danger btn-xs">Pdf</button>
                              
                           </div>
                        </div>
                        <div class="col-sm-6  text-center">
                           <h1>Pregnant</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(../../Img/Icon/pregnant.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <div class="btn-group">
                              <button type="submit" name="preg" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="pregpdf" class="btn btn-danger btn-xs">Pdf</button>
                              
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>