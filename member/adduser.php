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
            <a  href="./applist.php">应用列表</a>&nbsp;|&nbsp;<a  href="../device/mobdevice.php">移动设备</a>
        </div>
    </div>
    <div id="list">
        <div id="listdet" class="detail">
            <div   class="detail"><a href="./myapp.php" >上传应用</a></div>
            <div  class="detail"><a href="./delapp.php" >我的应用</a></div>
            <div  class="detail"><a href="../device/mydevice.php" >我的设备</a></div>
            <div  class="detail">编译IOS应用</div>
            <div  class="detail">编译Android</div>
            <?php
            include('../conn_mysql.php');
            $query="select * from new_user_info where user_name='{$_SESSION['UserName']}' and password='{$_SESSION['Password']}' and power=3 ";
            @     $result1=mysqli_query($conn,$query);
            @    $row=mysqli_fetch_array($result1);
            if($row){
                echo ' <div  id="add_app" class="detail">添加用户</div>';
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
        <div class="content">
            <form  id="fr" action="../user_check.php"  method="post" name="upform" >
                <table >
                    <tr>
                        <th scope="row">
                            用户角色：
                        </th>
                        <td><input type="radio" name="rol" value="2" required aria-required="true">
                            开发
                            <input type="radio" name="rol" value="3" required aria-required="true">
                            测试
                            <input type="radio" name="rol" value="4" required aria-required="true">
                            需求
                            <input type="radio" name="rol" value="5" required aria-required="true">
                            产品
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            用户权限：
                        </th>
                        <td><input type="radio" name="release" value="1" required aria-required="true">
                            下载权限
                            <input type="radio" name="release" value="2" required aria-required="true">
                            添加删除权限
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">用&nbsp;户&nbsp;名：</th>
                        <td><input type="text" name="uid" required aria-required="true" placeholder="ex:lichuangye"></td>
                    </tr>
                    <tr>
                        <th scope="row">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</th>
                        <td><input type="password" name="pid" required aria-required="true"></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td><input id="fo1" type="submit"  name="submit"  value="添加用户"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>



</div>
</body>
</html>