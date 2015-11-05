<?php
//在显示登录界面之前，首先判断是否保存了用户登录信息，如果有，则自动登录
header('Content-type: text/html; charset=utf-8');
include('../conn_mysql.php');
session_start();
?>
<html>
<head>
    <title>删除APP</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;"  />
    <link href="../css/addfile_new.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="bd">
    <div id="top">

        <a id="top1" href="index.php">首页</a>

        <a id="top2" href="../logout.php">你好：<?php echo $_SESSION['UserName'];  ?>!退出登录</a>

    </div>
    <div id="title">
        <h4>删除APP</h4>
    </div>
<?php
header('Content-type: text/html; charset=utf-8');
include('../conn_mysql.php');
$prj=$_GET['id'];
$sql="update new_app_info set app_status=2 ,del_name='$_SESSION[UserName]',del_time=now() where id=$prj";
$result1=mysqli_query($conn,$sql);
if($result1){
    echo "数据删除成功！";
    echo '<br/>';
    echo '<br/>';
    echo '<br/>';
    echo '<a href="../member/delapp.php">返回</a>';
}
else {
    echo "数据删除失败！";
    echo '<br/>';
    echo '<br/>';
    echo '<br/>';
    echo '<a href="../member/delapp.php">返回</a>';
    exit;
}
?>
</div>
</body>
</html>