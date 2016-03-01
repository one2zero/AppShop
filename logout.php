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
    <!-- <link href="css/addfile.css" rel="stylesheet" type="text/css" /> -->

    <!-- Loading Bootstrap -->
    <link href="/AppShop/Flat-UI-master/dist/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="/AppShop/Flat-UI-master/dist/css/flat-ui.css" rel="stylesheet">
</head>
<body>




<div class="container">

      <nav role="navigation" class="navbar navbar-inverse navbar-embossed navbar-lg">
        <div class="navbar-header">
          <button data-target="#bs-example-navbar-collapse-17" data-toggle="collapse" class="navbar-toggle" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="../index.php" class="navbar-brand">AppShop</a>
        </div>
        <!-- <div id="bs-example-navbar-collapse-10" class="collapse navbar-collapse"> -->
          <p class="navbar-text">已成功登出</p>
        <!-- </div> -->

        <?php
            unset($_SESSION["Password"]);
            unset($_SESSION["UserName"]);
            session_destroy();
        ?>
              

            <div id="bs-example-navbar-collapse-17" class="collapse navbar-collapse">
                <p class="navbar-text navbar-right"><a class="navbar-link" href="login.php">登录</a></p>
                <!-- <p class="navbar-text navbar-right"><a class="navbar-link" href="../index.php">首页</a></p> -->
              
            </div>
      </nav>
    </div>
</body>
</html>

