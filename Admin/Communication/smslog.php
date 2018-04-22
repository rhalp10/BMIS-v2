<?php
include("../../connection.php");
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['user_session'];
// SQL Query To Fetch Complete Information Of User

$ses_sql=mysqli_query($conn,"SELECT acc_ID,official_ID FROM user_account WHERE acc_ID ='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['acc_ID'];


if(!isset($login_session)){
  mysqli_close($connection); // Closing Connection
  header('Location: ../../index.php'); // Redirecting To Home Page
}
?>
<!DOCTYPE html>
<html lang="en">
<?php 

  include ("global_head.php");
?>
<body >

     <?php 
   include('global_nav.php');
   ?>
<div class="container" style="margin-top:120px;">
      <table class="table table-bordered " id="smslog">
        <thead class="bg-primary">
          <tr>
            <th>Receiver Name</th>
            <th>Title</th>
            <th>Mobile Number</th>
            <th>Position</th>
            <th>Date Send</th>
          </tr>
        </thead>
        <tbody >
          <tr>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
          </tr>
          <tr>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
          </tr>
        </tbody>
      </table>
</div>

<script type="text/javascript">
$(document).ready( function () {
    $('#smslog').DataTable();
} );
</script>
</body>
</html>
