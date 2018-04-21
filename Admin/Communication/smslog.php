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
