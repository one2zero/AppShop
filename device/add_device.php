<?php
//在显示登录界面之前，首先判断是否保存了用户登录信息，如果有，则自动登录

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
//提交设备数据到数据库
if($_POST['submit']){
    include('../conn_mysql.php');
    mysqli_query($conn,"set names utf8");
    $sql="insert into new_mob_device (id,dev_type,dev_id,dev_name,dev_version,pixel,stat,holder,job_id,cn_name,use_time,comments,add_time) values('','$_POST[release]','$_POST[bid]','$_POST[dev_name]','$_POST[dev_version]','$_POST[pixel]','$_POST[stat]','$_POST[holder]','$_POST[telphone]','$_POST[china]','','$_POST[comments]',now())";
    if(  $result=mysqli_query($conn,$sql)){
        echo '<script>alert("恭喜！添加成功!")</script>';
    }
    else{
        echo '<script>alert("添加失败!")</script>';
    }
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
        <div id="logo"><a href="../member/membercenter.php">管理中心</a> </div>
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
            <div  class="detail"><a href="../member/myapp.php" >上传应用</a></div>
            <div  class="detail"><a href="../member/delapp.php" >我的应用</a></div>
            <div  class="detail"><a href="./mydevice.php" >我的设备</a></div>
            <div  class="detail">编译IOS应用</div>
            <div  class="detail">编译Android</div>
            <?php
            $query="select * from new_user_info where user_name='{$_SESSION['UserName']}' and password='{$_SESSION['Password']}' and power=3 ";
            @ $result1=mysqli_query($conn,$query);
            @ $row=mysqli_fetch_array($result1);
            if($row){
                echo ' <div   class="detail"><a href="../member/adduser.php">添加用户<a/></div>';
                echo '<div   class="detail"></div>';
                echo '<div id="add_app"  class="detail"><a href="">添加设备<a/></div>';
                echo '<div   class="detail"><a href="./device_manage.php">管理设备<a/></div>';
                echo '<div   class="detail"></div>';
                echo '<div   class="detail"></div>';
            }
            ?>
        </div>
    </div>
    <div id="main">
        <div id="content1">
            <form  id="fr" action=""   method="post" name="upform" >
                <table >
                    <tr>
                        <th scope="type">
                            设备类型：
                        </th>
                        <td><input type="radio" name="release" value="1" required aria-required="true">
                            设备
                            <input type="radio" name="release" value="2" required aria-required="true">
                            配件
                    </tr>
                    <tr>
                        <th scope="row">设备编号：</th>
                        <td><input type="text" name="bid" required aria-required="true" placeholder="ex:xxxxxxxxxxxx"></td>
                    </tr>
                    <tr>
                        <th scope="row">设备名称：</th>
                        <td><input type="text" name="dev_name" required aria-required="true" placeholder="ex:iphone 5"></td>
                    </tr>
                    <tr>
                        <th scope="row">系统版本：</th>
                        <td><input type="text" name="dev_version" required aria-required="true" placeholder="ex:ios5.1.1"></td>
                    </tr>
                    <tr>
                        <th scope="row">分辨率：</th>
                        <td><input type="text" name="pixel" required aria-required="true" placeholder="ex:640*480"></td>
                    </tr>
                    <tr>
                        <th scope="stat">
                            设备状态：
                        </th>
                        <td><input type="radio" name="stat" value="1" required aria-required="true">
                            空闲
                            <input type="radio" name="stat" value="2" required aria-required="true">
                            占用
                            <input type="radio" name="stat" value="3" required aria-required="true">
                            禁用
                    </tr>
                    <tr>
                        <th scope="row">借用人：</th>
                        <td><input type="text" name="holder"  placeholder="ex:lichuangye"></td>
                    </tr>
                    <tr>
                        <th scope="row">姓名：</th>
                        <td><input type="text" name="china"  placeholder="ex:李创业"></td>
                    </tr>
                    <tr>
                        <th scope="row">分机号：</th>
                        <td><input type="text" name="telphone"  placeholder="ex:6719"></td>
                    </tr>
                    <tr>
                        <th scope="row">设备备注：</th>
                        <td><input type="text" name="comments"  placeholder="ex:包含机身、数据线、充电器"></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td><input id="fo1" type="submit"  name="submit"  value="&nbsp;提&nbsp;交&nbsp;数&nbsp;据&nbsp;"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
</div>
</body>
</html>