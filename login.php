<?php
//在显示登录界面之前，首先判断是否保存了用户登录信息，如果有，则自动登录
error_reporting(0);
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
    header("refresh:0;url=../AppShop/private.php");

     }
    if($row[power]==2){
        header("refresh:0;url=../AppShop/manage.php");
    }
    if($row[power]==3){
        header("refresh:0;url=../AppShop/adduser.php");
    }
}
?>
<html>
<head>
    <meta charset="utf-8">
    <title>AppShop</title>
    <meta name="description" content="Flat UI Kit Free is a Twitter Bootstrap Framework design and Theme, this responsive framework includes a PSD and HTML version."/>

    <meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="/AppShop/Flat-UI-master/dist/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="/AppShop/Flat-UI-master/dist/css/flat-ui.min.css" rel="stylesheet">

    <link rel="shortcut icon" href="AppShop/Flat-UI-master/img/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="dist/js/vendor/html5shiv.js"></script>
      <script src="dist/js/vendor/respond.min.js"></script>
    <![endif]-->
  </head>
 <body>
    
    <div class="container">

        <nav class="navbar navbar-inverse navbar-lg navbar-embossed" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-9">
            </button> -->
            <a class="navbar-brand" href="index.php">AppShop</a>
          </div>
          
        </div>
      </nav>

        <form role="form" method="post" action="login_go.php">
          <div class="login-form">
            <div class="form-group">
              <input name="UserName" type="text" class="form-control login-field" value="" placeholder="用户名" id="login-name" />
              <label class="login-field-icon fui-user" for="login-name"></label>
            </div>

            <div class="form-group">
              <input name="Password" type="password" class="form-control login-field" value="" placeholder="密码" id="login-pass" />
              <label class="login-field-icon fui-lock" for="login-pass"></label>
            </div>

            <button type="submit" class="btn btn-primary btn-lg btn-block">登录</button>

            <p class="text-center"><small>如有问题，请联系：jianwen@pipapai.com</small></p>
          </div>
        </form>

    </div>
    <!-- /.container -->

  </body>
</html>
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