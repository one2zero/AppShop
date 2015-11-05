<?php
//在显示登录界面之前，首先判断是否保存了用户登录信息，如果有，则自动登录
header('Content-type: text/html; charset=utf-8');
include('conn_mysql.php');
session_start();
$query="select * from new_user_info where user_name='{$_SESSION['UserName']}' and password='{$_SESSION['Password']}'";
$result1=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result1);
//refresh:0;
if ($row)
{
    if($row[power]==1){
    header("refresh:0;url=http://mobapp.vemic.com/private.php");

     }
    if($row[power]==2){
        header("refresh:0;url=http://mobapp.vemic.com/manage.php");
    }
    if($row[power]==3){
        header("refresh:0;url=http://mobapp.vemic.com/adduser.php");
    }
}
?>
<html>
<head>
    <title>用户登录</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;"  />
    <link href="css/login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="title">
    用户登录
</div>
<div id="content">
<form name="form1" method="post" action="login_go.php">
    用户名：<input name="UserName" type="text" size="20" id="UserName" required aria-required="true" placeholder="eg:lichuangye" ><br/><br/>
    密&nbsp;&nbsp;码：<input name="Password" type="Password" size="20" id="Password" required aria-required="true"><br/><br/>
	<!--
    <input name="KeepInfo" type="checkbox" value="KeepInfo"> 保存登录信息 ( 1
    天 )<br><br>
		-->
    <input name="Submit" type="submit" value="登录">

</form>
</div>
<div id="dev">
    <a href="index.php">返回首页</a><br><br>
    <p>与域账号不关联</p><br>
<p>帮助联系：jianwen@pipapai.com</p>
</div>
</body>
</html>
<?php
include('conn_mysql.php');
$sql="select *  from new_count_num ";
$result1=mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result1);
$index=$row[login_num] +1;
$sql="update new_count_num set login_num= $index ";
$result1=mysqli_query($conn,$sql);
 
?>