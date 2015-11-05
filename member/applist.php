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
    header("refresh:1;url=http://mobapp.vemic.com/login.php");
    exit;

}

?>
<html>
<head>
    <title>管理中心</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;"  />
    <link href="../css/membercenter.css" rel="stylesheet" type="text/css" />
</head>
<body id="bd"   >
<div id="index">
    <div id="title" >
        <div id="logo"><a href="./membercenter.php">管理中心</a> </div>
        <div id="top">
            <a id="top1" href="../index.php">首页</a>
            <a id="top2" href="../logout.php">你好：<?php echo $_SESSION['UserName'];  ?>!退出登录</a>
        </div>
        <div id="gtitle">
            <a id="applist" href="#">应用列表</a>&nbsp;|&nbsp;<a  href="../device/mobdevice.php">移动设备</a>
        </div>
    </div>
    <div id="list">
        <div id="listdet" class="detail">
            <div  class="detail"><a href="./myapp.php" >上传应用</a></div>
            <div  class="detail"><a href="./delapp.php" >我的应用</a></div>
            <div  class="detail"><a href="../device/mydevice.php" >我的设备</a></div>
            <div  class="detail">编译IOS应用</div>
            <div  class="detail">编译Android</div>
            <?php
            $query="select * from new_user_info where user_name='{$_SESSION['UserName']}' and password='{$_SESSION['Password']}' and power=3 ";
            @ $result1=mysqli_query($conn,$query);
            @ $row=mysqli_fetch_array($result1);
            if($row){
                echo ' <div   class="detail"><a href="./adduser.php">添加用户<a/></div>';
                echo '<div   class="detail"></div>';
                echo '<div   class="detail"><a href="../device/add_device.php">添加设备<a/></div>';
                echo '<div   class="detail"><a href="../device/device_manage.php">管理设备<a/></div>';
                echo '<div   class="detail"></div>';
                echo '<div   class="detail"></div>';
            }
            ?>
        </div>
    </div>
    <div id="main">
        <div id="content">
            <table  id="dw"  border="2" >
                <tr>
                    <th>项目</th>
                    <th>应用平台</th>
                    <th>&nbsp;文件名&nbsp;</th>
                    <th>添加时间</th>
                    <th>&nbsp;添加人&nbsp;</th>
                </tr>
                <?php
                include('../conn_mysql.php');
                $sql="select distinct app_name,a.id,project,platform,add_time,prj_name,add_name from new_app_info as a  left join new_config_prj as b on a.project=b.prj_num where  app_status=1 and app_power=1 ORDER BY project asc,platform asc ";
                @    $result1=mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($result1)){
                    $v=$row[app_name];
                    $ex=explode('.',$v);
                    $num=count($ex);
                    if($ex[0]!=''){
                        ?>
                        <tr>
                            <td style="line-height:200%" ><?php echo $row[prj_name]; ?></td>
                            <td style="line-height:200%" ><?php echo $row[platform]; ?></td>
                            <td style="line-height:200%" ><?php echo $v; ?></td>
                            <td style="line-height:200%" ><?php echo $row[add_time]; ?></td>
                            <?php

                            ?>
                            <td style="line-height:200%" ><?php echo $row[add_name]; ?></td>
                        </tr>

                        <?php
                    }
                }
                ?>
            </table>
        </div>
    </div>
</div>



</div>
</body>
</html>