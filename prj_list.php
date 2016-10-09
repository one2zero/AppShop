<?php
error_reporting(0);
header('Content-type: text/html; charset=utf-8');
session_start();
?>
<html>

<head>
    <meta charset="utf-8">
    <title>AppShop--Pipapai.inc</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="/AppShop/Flat-UI-master/dist/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="/AppShop/Flat-UI-master/dist/css/flat-ui.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="../../dist/js/vendor/html5shiv.js"></script>
      <script src="../../dist/js/vendor/respond.min.js"></script>
    <![endif]-->
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
         <?php
        if($_SESSION[UserName]!=''){
        ?> 
              

            <div id="bs-example-navbar-collapse-17" class="collapse navbar-collapse">
              <p class="navbar-text navbar-right"><a class="navbar-link" href="./logout.php">退出</a></p>
              <p class="navbar-text navbar-right"><a class="navbar-link" href="./member/membercenter.php"><?php echo $_SESSION[UserName]; ?></a></p>
            </div>
        <?php
        }else{
        ?>
            <div id="bs-example-navbar-collapse-17" class="collapse navbar-collapse">
              <p class="navbar-text navbar-right"><a class="navbar-link" href="login.php">登录</a></p>
            </div>
        <?php
        }
        
        ?>
      </nav>



    <div class="row">
        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
            <a href="prj_detail.php?id=1"><img src="pri_logo/logo_pipapai.png" alt="Compas" class="tile-image big-illustration"></a>
            <div class="caption">
              <h3>呼啦呼</h3>
              <p><a class="btn btn-primary btn-lg btn-block" href="prj_detail.php?id=1">前往</a></p>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
            <a href="prj_detail.php?id=1"><img src="pri_logo/logo_zjzc.png" alt="Compas" class="tile-image big-illustration"></a>
            <div class="caption">
              <h3>走进职场</h3>
              <p><a class="btn btn-primary btn-lg btn-block" href="prj_detail.php?id=2">前往</a></p>
            </div>
          </div>
        </div>
    </div>


</div>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/AppShop/Flat-UI-master/dist/js/vendor/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/AppShop/Flat-UI-master/dist/js/flat-ui.min.js"></script>

    <script src="/AppShop/Flat-UI-master/assets/js/application.js"></script>

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

