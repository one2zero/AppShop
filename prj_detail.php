<?php
error_reporting(0);
include('conn_mysql.php');
session_start();
$prj=$_GET['id'];
$sql="select prj_name from new_config_prj where prj_num=$prj   ";
$result1=mysqli_query($conn,$sql);
$prj_title = mysqli_fetch_array($result1);
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
          <!-- <a href="#" class="navbar-brand"><?php echo $prj_title[prj_name] ?>应用列表</a> -->
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

<?php
    $sql="select distinct app_name,platform,add_time,add_name from new_app_info where project=$prj and app_status=1 and app_power=1  ORDER BY add_time desc ";
  @  $result1=mysqli_query($conn,$sql);
 while($row = mysqli_fetch_array($result1)){
    $v=$row[app_name];
    $user=$row[add_name];
    $ex=explode('.',$v);
    $num=count($ex);
    if($ex[$num-1]=="ipa"){
        $ServerUrl=$_SERVER['DOCUMENT_ROOT'];
        $su=array_pop($ex);
        $str = implode('.',$ex);
        $ipa= "itms-services://?action=download-manifest&url=https://192.168.1.175/new_app/pub_plist/";
        $plist=md5($str).".plist";

        $down="../new_app/pub_ipa/".$v;
        $md5file = md5_file($down);

        $down=$ipa.$plist;

    }
    else{
        $down="../new_app/pub_apk/".$v;
        $md5file = md5_file($down);
    }
    
    if($ex[0]!=''){
                ?>

        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
            <!-- <a href="prj_detail.php?id=1"><?php echo $row[platform]; ?><img src="pri_logo/logo_pipapai.jpg" alt="Compas" class="tile-image big-illustration"></a> -->
            <div class="caption">

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
              
              <!-- <div class="text"> -->
                <h4 class="text"><?php echo $v; ?></h4>
              <!-- </div> -->
              <p><small>MD5：<?php echo $md5file; ?></small></p>
              <p>上传人：<?php echo $user; ?></p>
              <p>上传时间：<?php echo mb_substr($row[add_time],0,16,"utf-8"); ?></p>
              <p><a class="btn btn-primary btn-lg btn-block" href="<?php echo $down ?>">下载</a></p>
            </div>
          </div>
        </div>
 

            <?php
            }
}
?>
   </div><!-- row -->
</div><!-- container -->



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/AppShop/Flat-UI-master/dist/js/vendor/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/AppShop/Flat-UI-master/dist/js/flat-ui.min.js"></script>

    <script src="/AppShop/Flat-UI-master/assets/js/application.js"></script>

</body>
</html>
