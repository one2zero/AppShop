<?php 
include('conn_mysql.php');
  $sql="select * from test ";
  $result1=mysqli_query($conn,$sql);
  while($row = mysqli_fetch_array($result1)){
      $a =  $row[test];
      echo $a;
  }




?>