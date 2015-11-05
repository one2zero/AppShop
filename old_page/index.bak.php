<?php
header('Content-type: text/html; charset=utf-8');
include('conn_mysql.php');
session_start();
?>
<html>
<head>
<title>移动APP服务器</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;"  />
<link href="css/new.css" rel="stylesheet" type="text/css" />
</head>
<body  >
<div id="index">
    <div id="title" >
  移动APP服务器
    </div>
    <div id="content">
        <div class="wk">
            <div class="img1"><a href="public.php"><img src="app/gc.png"></a></div>
            <div class="wz"><a href="public.php">内测应用</a></div>
        </div>
        <div class="wk">
            <div class="img1"><a href="prj_list.php"><img src="app/xm.png"></a></div>
            <div class="wz"><a href="prj_list.php">项目目录</a></div>
        </div>
        <div class="wk">
            <div class="img1"><a href="private.php"><img src="app/sy.png"></a></div>
            <div class="wz"><a href="private.php">私有应用</a></div>
        </div>
        <div class="wk">
            <div class="img1"><a href="aipa.php"><img src="app/yl.png"></a></div>
            <div class="wz"><a href="aipa.php">持续集成</a></div>
        </div>
    </div>
    <div id="dev">
        <?php
        if($_SESSION[UserName]==''){
            echo '<a href="login.php">登录</a>&nbsp;|&nbsp;<a href="manage.php">管理&nbsp;APP</a>';
        }
        else{
            echo '<a href="logout.php">退出</a>&nbsp;|&nbsp;<a href="manage.php">管理&nbsp;APP</a>';
        }
        ?>
    </div>
</div>
</body>
</html>
<?php
include('conn_mysql.php');
$sql="select *  from new_count_num ";
$result1=mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result1);
$index=$row[index_num] +1;
$sql="update new_count_num set index_num= $index ";
$result1=mysqli_query($conn,$sql);
?>
