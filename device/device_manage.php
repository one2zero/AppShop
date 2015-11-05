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
        <div id="logo"><a href="../member/membercenter.php">管理中心</a> </div>
        <div id="top">
            <a id="top1" href="../index.php">首页</a>
            <a id="top2" href="../logout.php">你好：<?php echo $_SESSION['UserName'];  ?>!退出登录</a>
        </div>
        <div id="gtitle">
            <a  href="../member/applist.php">应用列表</a>&nbsp;|&nbsp;<a  href="./mobdevice.php">移动设备</a>
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
                echo '<div   class="detail"><a href="./add_device.php">添加设备<a/></div>';
                echo '<div id="add_app"  class="detail"><a href="">管理设备<a/></div>';
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
                    <th>设备序号</th>
                    <th>设备名称</th>
                    <th>系统版本</th>
                    <th>分辨率</th>
                    <th>设备状态</th>
                    <th>借用人</th>
                    <th>分机号</th>
                    <th>编辑</th>
                </tr>
                <?php
                include('../conn_mysql.php');
                mysqli_query($conn,"set names utf8");
                $sql="select * from new_mob_device where stat in (1,2) ORDER BY stat asc,holder asc  ";
                $result1=mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($result1)){
                    if($row[stat]==1){
                        $stat="空闲";
                    }else{
                        $stat="占用";
                    }
                    ?>
                    <tr>
                        <td style="line-height:200%" ><?php echo $row[dev_id]; ?></td>
                        <td style="line-height:200%" ><?php echo $row[dev_name]; ?></td>
                        <td style="line-height:200%" ><?php echo $row[dev_version]; ?></td>
                         <td style="line-height:200%" ><?php echo $row[pixel]; ?></td>
                        <td style="line-height:200%" ><?php echo $stat; ?></td>
                        <td style="line-height:200%" ><?php echo $row[cn_name]; ?></td>
                        <td style="line-height:200%" ><?php echo $row[job_id]; ?></td>
                        <td style="line-height:200%" ><a href="./device_edit.php?id=<?php echo $row[id]; ?>">编辑</a> </td>
                    </tr>

                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>



</div>
</body>
</html>