<?php
error_reporting(0);
header('Content-type: text/html; charset=utf-8');
?>
<html>
<head>
<title>项目列表</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;"  />
<link href="css/prj_list.css" rel="stylesheet" type="text/css" />
</head>
<body  >
<div id="index">
  <div id="title" > 项目列表 </div>
  <div id="content">

    <div class="wk">
      <div class="img1"><a href="prj_detail.php?id=1"><img src="pri_logo/logo_pipapai.jpg"></a></div>
      <div class="wz"><a href="prj_detail.php?id=1">枇杷派</a></div>
    </div>
  </div>
  <div id="dev">
    <hr/>
    <a href="index.php">返回首页</a> </div>
</div>
</body>
</html>
<?php
include('conn_mysql.php');
$sql="select *  from new_count_num ";
$result1=mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result1);
$index=$row[prj_num] +1;
$sql="update new_count_num set prj_num= $index ";
$result1=mysqli_query($conn,$sql);
 
?>

