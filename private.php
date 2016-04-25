<?php
error_reporting(0);
header('Content-type: text/html; charset=utf-8');
include('conn_mysql.php');
session_start();
$query="select * from new_user_info where user_name='{$_SESSION['UserName']}' and password='{$_SESSION['Password']}' and power in (1,2,3)";
$result1=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result1);
if ($row)
{

}
else{

    header("refresh:1;url=../login.php");
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

    <style type="text/css">
    .text {
        height: 65px;
        overflow: hidden;
        word-wrap: break-word;
    }
    </style>
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

    <div class="tab-pane" id="tab2">
                <p></p>

                <div class="row">

                <?php
                    include('../conn_mysql.php');
                    $sql="select distinct app_name,a.id,project,platform,add_time,prj_name,app_power from new_app_info as a  left join new_config_prj as b on a.project=b.prj_num where  app_status=1 and app_power in (1,2,3) and add_name ='{$_SESSION['UserName']}' ORDER BY add_time desc ";
                    @   $result1=mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_array($result1)){
                        $v=$row[app_name];
                        $ex=explode('.',$v);
                        $num=count($ex);
                        if($ex[0]!=''){
                ?>

                        <div class="col-sm-6 col-md-4">
                          <div class="thumbnail">
                            <!-- <a href="prj_detail.php?id=1"><?php echo $row[platform]; ?><img src="pri_logo/logo_pipapai.jpg" alt="Compas" class="tile-image big-illustration"></a> -->
                            <div class="caption">
                              
                              <!-- <div class="text"> -->
                                <h4 class="text"><?php echo $v; ?></h4>
                              <!-- </div> -->
                            <?php
                                if($row[platform]=='iPhone'|| $row[platform]=='iPad'){
                                ?>
                                    <h6><span class="fui-apple"></span>  <?php echo $row[platform]; ?></h6>
                                <?php
                                }else{
                                ?>
                                    <h6><span class="fui-android"></span>  <?php echo $row[platform]; ?></h6>
                                <?php
                                }
                            ?>
                              <p>项目名称：<?php echo $row[prj_name]; ?></p>
                              <p>上传时间：<?php echo mb_substr($row[add_time],0,16,"utf-8"); ?></p>
                              <p><a class="btn btn-primary btn-lg btn-block" href="../member/del_detail.php?id=<?php echo $row[id]; ?>">删除</a></p>
                            </div>
                          </div>
                        </div>
                 

                <?php
                            }
                        }
                ?>
                </div><!-- row -->

            </div><!-- tab2 -->
    </div>

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
$index=$row[pri_num] +1;
$sql="update new_count_num set pri_num= $index ";
$result1=mysqli_query($conn,$sql);
 
?>

