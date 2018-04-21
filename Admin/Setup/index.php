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
                <a class="navbar-brand" href="index">SETUP BARANGAY INFO</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <!--  <li class="active"><a href="index">Home</a></li>
            <li><a href="smslog">SMS Log</a></li> -->
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>
    <div class="container" style="margin-top:120px;">
        <?php
      $sql = mysqli_query($conn,"SELECT * FROM `brgy_address_info`");
      $brgy_info = mysqli_fetch_array($sql);     
      ?>
            <form method="POST">
                <div class="form-group">

                    <label for="pwd"><button class="btn btn-primary pull-right">EDIT</button></label>
                </div>
                <div class="form-group">
                    <label for="pwd">Baragany Name:</label>
                    <input type="text" class="form-control" id="title" name="brgy_name" disabled="" value="<?php echo $brgy_info[0]?>">
                </div>
                <div class="form-group">
                    <label for="pwd">Baragany City:</label>
                    <input type="text" class="form-control" id="title" name="brgy_city" disabled="" value="<?php echo $brgy_info[1]?>">
                </div>
                <div class="form-group">
                    <label for="pwd">Baragany Province:</label>
                    <input type="text" class="form-control" id="title" name="brgy_province" disabled="" value="<?php echo $brgy_info[2]?>">
                </div>
            </form>
            <?php
      $sql = mysqli_query($conn,"SELECT * FROM `ref_logo` ");
          
      $brgy_logo = mysqli_fetch_array($sql);
     
      ?>
                <div class="col-sm-12">
                    <div class="col-sm-6  text-center">
                        <label>Barangay Logo</label>
                        <br>
                        <form id="form1" runat="server">

                            <div class="form-group">
                                <input type='file' id="imgInp" class="form-control" />
                            </div>
                            <div class="form-group">
                                <img id="blah" src="../../Img/Icon/logo.png" alt="your image" height="250" width="250" class="img-circle" />
                            </div>
                            <div class="form-group">
                                <input type="Submit" name="submit-brgypalLogo" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-6 text-center">
                        <label>Municipal Logo</label>
                        <br>
                        <form id="form1" runat="server">
                            <div class="form-group">

                                <input type='file' id="imgInp1" class="form-control" />
                            </div>
                            <div class="form-group">

                                <img id="blah1" src="../../Img/Icon/logo.png" alt="your image" height="250" width="250" class="img-circle" />
                            </div>
                            <div class="form-group">
                                <input type="Submit" name="submit-municipalLogo" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>



    </div>

    <script type="text/javascript">
        function readURL(input) {
        
          if (input.files && input.files[0]) {
            var reader = new FileReader();
        
            reader.onload = function(e) {
              $('#blah').attr('src', e.target.result);
        
        
            }
        
            reader.readAsDataURL(input.files[0]);
          }
        }
        function readURL1(input) {
        
          if (input.files && input.files[0]) {
            var reader = new FileReader();
        
            reader.onload = function(e) {
              $('#blah1').attr('src', e.target.result);
        
        
            }
        
            reader.readAsDataURL(input.files[0]);
          }
        }
        
        $("#imgInp").change(function() {
          readURL(this);
        });
        $("#imgInp1").change(function() {
          readURL1(this);
        });
    </script>
</body>

</html>