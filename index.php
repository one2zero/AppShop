<?php
error_reporting(0);
header('Content-type: text/html; charset=utf-8');
include('conn_mysql.php');
session_start();
//测试ip拦截
function getIP()
{
    global $ip;
    if (getenv("HTTP_CLIENT_IP"))
        $ip = getenv("HTTP_CLIENT_IP");
    else if(getenv("HTTP_X_FORWARDED_FOR"))
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    else if(getenv("REMOTE_ADDR"))
        $ip = getenv("REMOTE_ADDR");
    else $ip = "Unknow";
    return $ip;
}
$ipd=getIP();

if($ipd=="192.168.21.62"){
    echo '<br/>';
    echo "页面太挫，不忍直视，不好意思加载，放弃吧！";
	echo "任何问题联系：6719 ！";
    exit;
}


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

<body  >
<div class="container">

      <nav role="navigation" class="navbar navbar-inverse navbar-embossed navbar-lg">
        <div class="navbar-header">
          <button data-target="#bs-example-navbar-collapse-17" data-toggle="collapse" class="navbar-toggle" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="#" class="navbar-brand">AppShop</a>
        </div>
         <?php
        if($_SESSION[UserName]!=''){
        ?> 
              

            <div id="bs-example-navbar-collapse-17" class="collapse navbar-collapse">
              <p class="navbar-text navbar-right"><a class="navbar-link" href="logout.php">退出</a></p>
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
            <a href="prj_list.php"><img src="app/xm.png" alt="Compas" class="tile-image big-illustration"></a>
            <div class="caption">
              <h3>公开测试应用</h3>
              <p>所有发布前的应用，公开发布，分别在开发网、测试网、和外网测试完成后才可以发布</p>
              <p><a class="btn btn-primary btn-lg btn-block" href="prj_list.php">前往</a></p>
            </div>
          </div>
        </div>


        <?php
        if($_SESSION[UserName]!=''){
            ?>

            <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
            <a href="private.php"><img src="app/sy.png" alt="Compas" class="tile-image big-illustration"></a>
            <div class="caption">
              <h3>私有应用</h3>
              <p>所有发布前的应用，公开发布，分别在开发网、测试网、和外网测试完成后才可以发布</p>
              <p><a class="btn btn-primary btn-lg btn-block" href="private.php">前往</a></p>
            </div>
          </div>
        </div>
        <?php
        }
        
        ?>
        
    </div>
<h4><a href="https://192.168.1.175/new_app/pipapai.crt">下载证书</a></h4>
<h4><a href="https://192.168.1.175/new_app/rootCA.crt">内网证书</a></h4>

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
$index=$row[index_num] +1;
$sql="update new_count_num set index_num= $index ";
$result1=mysqli_query($conn,$sql);
?>
