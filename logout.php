<?php
header('Content-type: text/html; charset=utf-8');
include('conn_mysql.php');
session_start();
?>
<html>
<head>
    <title>退出登录</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;"  />
    <link href="css/addfile.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="bd" >
    <div id ="title">
        <h2>退出登录</h2>
    </div>
    <?php
    unset($_SESSION["Password"]);
    unset($_SESSION["UserName"]);
    session_destroy();
?>

    <div id="logout">
        <hr>
    <a href="index.php">首页</a>|<a href="login.php">重新登录</a>
    </div>
</div>
</body>
</html>

