<?php
//在显示登录界面之前，首先判断是否保存了用户登录信息，如果有，则自动登录
header('Content-type: text/html; charset=utf-8');
include('conn_mysql.php');
session_start();
?>
<html>
<head>
    <title>登录成功</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;"  />
    <link href="css/addfile.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="bd" >
    <div id ="title">
        <h2>登录成功</h2>
    </div>
    <div id="sheet">

        <a href="index.php">返回首页</a><br><br>
        <a href="private.php">下载私有APP</a><br><br>
        <a href="/member/membercenter.php">管理中心</a><br><br>
    </div>
</div>
</body>
</html>

