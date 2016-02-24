<?php
//在显示登录界面之前，首先判断是否保存了用户登录信息，如果有，则自动登录
error_reporting(0);
header('Content-type: text/html; charset=utf-8');
include('../conn_mysql.php');
session_start();
$query="select * from new_user_info where user_name='{$_SESSION['UserName']}' and password='{$_SESSION['Password']}' and power in (2,3)";
$result1=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result1);
if ($row)
{}
else{
    header("refresh:1;url=../login.php");
    exit;

}

?>
<html>

<body>
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
              <p class="navbar-text navbar-right"><a class="navbar-link" href="../logout.php">退出</a></p>
              <p class="navbar-text navbar-right"><a class="navbar-link" href="../member/membercenter.php"><?php echo $_SESSION[UserName]; ?></a></p>
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



    <div class="tabbable"> <!-- Only required for left/right tabs -->
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" data-toggle="tab">上传应用</a></li>
            <li><a href="#tab2" data-toggle="tab">我的应用</a></li>
            <!-- <li><a href="#tab3" data-toggle="tab">我的设备</a></li> -->
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab1">
                <p></p>

              <form role="form" method="post"  d="fr" action="../check.php" enctype="multipart/form-data" method="post" name="upform" >
              <div class="login-form">

                <div class="form-group">
                    <label for="exampleInputEmail1">下载权限:</label>
                        <input type="radio" name="release" value="1" required aria-required="true">
                        公开
                        <input type="radio" name="release" value="2" required aria-required="true">
                        私有
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">项目名称:</label>

                    <!-- <form action="#" type="get"> -->
                        <select name="project" data-toggle="select" class="form-control select select-default mrs mbm">
                            <?php
                                include('../conn_mysql.php');
                                $sql="select * from new_config_prj ";
                                $result1=mysqli_query($conn,$sql);
                                while($row = mysqli_fetch_array($result1)){
                                    ?>
                                    <option value="<?php echo $row[prj_num] ?>"><?php echo $row[prj_name] ?></option>
                                    <?php
                                }
                                ?>
                         </select>

                    <!-- </form> -->
                        
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">安装平台:</label>
                                <input type="radio" name="style" value="iPhone" required aria-required="true">
                                iPhone
                                <input type="radio" name="style" value="iPad" required aria-required="true">
                                iPad
                                <input type="radio" name="style" value="Android" required aria-required="true">
                                Android
                                <input type="radio" name="style" value="Android-HD" required aria-required="true">
                                Android-HD
                </div>

                <div class="form-group">
                  <input id="fo" name="upfile" type="file">
                  <p class="text-danger"><small>允许上传的文件后缀为:ipa、apk(注意程序后缀为小写)</small></p>
                </div>
                <!-- <button id="fo1" type="submit" class="btn btn-default">Submit</button> -->
                <td><input id="fo1" type="submit"  name="submit"  value="&nbsp;上&nbsp;传&nbsp;文&nbsp;件&nbsp;"></td>

            </div>
            </form>


            </div><!-- tab1 -->





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





            <!-- <div class="tab-pane" id="tab3">
                <p>Howdy, I'm in Section 3.</p>

                <div class="row">

                <?php
                    include('../conn_mysql.php');
                mysqli_query($conn,"set names utf8");
                $sql="select * from new_mob_device where stat in (1,2) and holder='{$_SESSION['UserName']}' ORDER BY stat asc,holder asc  ";
                $result1=mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($result1)){
                    if($row[stat]==1){
                        $stat="空闲";
                    }else{
                        $stat="占用";
                    }
                ?>
                        <div class="col-sm-6 col-md-4">
                          <div class="thumbnail">
                            <a href="prj_detail.php?id=1"><?php echo $row[platform]; ?><img src="pri_logo/logo_pipapai.jpg" alt="Compas" class="tile-image big-illustration"></a>
                            <div class="caption">

                              <h4 class="text"><?php echo $row[dev_name]; ?></h4>
                              <p>项目名称：<?php echo $row[dev_id]; ?>/p>
                              <p>项目名称：<?php echo $row[dev_version]; ?></p>
                              <p>项目名称：<?php echo $row[pixel]; ?></p>
                              <p>上传时间：<?php echo mb_substr($row[use_time],0,16,"utf-8"); ?></p>
                              <p>项目名称：<?php echo $row[comments]; ?></p>
                              <p><a class="btn btn-primary btn-lg btn-block" href="../member/del_detail.php?id=<?php echo $row[id]; ?>">删除</a></p>
                            </div>
                          </div>
                        </div>
                <?php
                            }
                ?>
                </div>
            </div> -->

        </div>
    </div>


</div>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/AppShop/Flat-UI-master/dist/js/vendor/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/AppShop/Flat-UI-master/dist/js/flat-ui.min.js"></script>

    <script src="/AppShop/Flat-UI-master/assets/js/application.js"></script>


<!-- <div id="index">
    <div id="title" >
        <div id="logo"><a href="./membercenter.php">管理中心</a> </div>
        <div id="top">
            <a id="top1" href="../index.php">首页</a>
            <a id="top2" href="../logout.php">你好：<?php echo $_SESSION['UserName'];  ?>!退出登录</a>
        </div>
        <div id="gtitle">
            <a  href="applist.php">应用列表</a>&nbsp;|&nbsp;<a  href="../device/mobdevice.php">移动设备</a>
        </div>
    </div>
    <div id="list">
        <div id="listdet" class="detail">
        <div  class="detail"><a href="./myapp.php" >上传应用</a></div>
        <div  class="detail"><a href="./delapp.php" >我的应用</a></div>
        <div  class="detail"><a href="../device/mydevice.php" >我的设备</a></div>
        <div  class="detail"><a href="../auto-build/auto_build_ios.php" >编译IOS应用</div>
        <div  class="detail"><a href="#" >编译Android</div>
         <?php
         $query="select * from new_user_info where user_name='{$_SESSION['UserName']}' and password='{$_SESSION['Password']}' and power=3 ";
        @ $result1=mysqli_query($conn,$query);
        @ $row=mysqli_fetch_array($result1);
         if($row){
                echo ' <div   class="detail"><a href="./adduser.php">添加用户<a/></div>';
                echo '<div   class="detail"></div>';
                echo '<div   class="detail"><a href="../device/add_device.php">添加设备<a/></div>';
                echo '<div   class="detail"><a href="../device/device_manage.php">管理设备<a/></div>';
                echo '<div   class="detail"><a href="../tail-log.php">Web日志<a/></div>';
                echo '<div   class="detail"><a href="../error-log.php">错误日志<a/></div>';
            }
            ?>
        </div>
    </div>
    <div id="main">
     <img src="../pic/main.jpg">
        </div>
    </div>
</div> -->



</body> 
</html>


<?php
include('../conn_mysql.php');
$sql="select *  from new_count_num ";
$result1=mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result1);
$index=$row[manage_num] +1;
$sql="update new_count_num set manage_num= $index ";
$result1=mysqli_query($conn,$sql);

?>



