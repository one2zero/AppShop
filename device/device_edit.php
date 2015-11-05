<?php
//在显示登录界面之前，首先判断是否保存了用户登录信息，如果有，则自动登录
header('Content-type: text/html; charset=utf-8');
include('../conn_mysql.php');
mysqli_query($conn,'set names utf8');
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
$id=$_GET['id'];
if($_POST['submit']){
    include('../conn_mysql.php');
    mysqli_query($conn,"set names utf8");
    $sql="update new_mob_device set dev_type='$_POST[release]',dev_id='$_POST[bid]',dev_name='$_POST[dev_name]',dev_version='$_POST[dev_version]',pixel='$_POST[pixel]',stat='$_POST[stat]',holder='$_POST[holder]',job_id='$_POST[telphone]',cn_name='$_POST[china]',use_time=now(),comments='$_POST[comments]' where id=$id ";
    if(  $result=mysqli_query($conn,$sql)){
        echo '<script>alert("恭喜！编辑成功!")</script>';
    }
    else{
        echo '<script>alert("编辑失败!")</script>';
    }
}


$sql=" select * from new_mob_device where id=$id";
$result2=mysqli_query($conn,$sql);
$result_data=mysqli_fetch_array($result2);
$dev_type_check_arr=array();
$stat_check_arr=array();

$dev_type_check_arr[$result_data['dev_type']]=' checked';

$stat_check_arr[$result_data['stat']]=' checked';
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
        <div id="content1">
            <form  id="fr" action=""   method="post" name="upform" >
                <table >
                    <tr>
                        <th scope="type">
                            设备类型：
                        </th>
                        <td><input type="radio" name="release" value="1" required aria-required="true" <?php echo  $dev_type_check_arr[1]; ?> >
                            设备
                            <input type="radio" name="release" value="2" required aria-required="true" <?php echo $dev_type_check_arr[2]; ?>>
                            配件
                    </tr>
                    <tr>
                        <th scope="row">设备编号：</th>
                        <td><input type="text" name="bid" required aria-required="true" placeholder="ex:xxxxxxxxxxxx" value='<?php  echo $result_data['dev_id']  ?>'   ></td>
                    </tr>
                    <tr>
                        <th scope="row">设备名称：</th>
                        <td><input type="text" name="dev_name" required aria-required="true" placeholder="ex:iphone 5"  value='<?php  echo $result_data['dev_name']  ?>'  ></td>
                    </tr>
                    <tr>
                        <th scope="row">系统版本：</th>
                        <td><input type="text" name="dev_version" required aria-required="true" placeholder="ex:ios5.1.1" value='<?php  echo $result_data['dev_version']  ?>' ></td>
                    </tr>
                    <tr>
                        <th scope="row">分辨率：</th>
                        <td><input type="text" name="pixel" required aria-required="true" placeholder="ex:640*480"  value='<?php  echo $result_data['pixel']  ?>' ></td>
                    </tr>
                    <tr>
                        <th scope="stat">
                            设备状态：
                        </th>
                        <td><input type="radio" name="stat" value="1" required aria-required="true"  <?php echo $stat_check_arr[1]; ?>>
                            空闲
                            <input type="radio" name="stat" value="2" required aria-required="true"  <?php echo $stat_check_arr[2]; ?>>
                            占用
                            <input type="radio" name="stat" value="3" required aria-required="true"  <?php echo $stat_check_arr[3]; ?>>
                            禁用
                    </tr>
                    <tr>
                        <th scope="row">借用人：</th>
                        <td><input type="text" name="holder"  placeholder="ex:lichuangye" value='<?php  echo $result_data['holder']  ?>'  ></td>
                    </tr>
                    <tr>
                        <th scope="row">姓名：</th>
                        <td><input type="text" name="china"  placeholder="ex:李创业"   value='<?php  echo $result_data['cn_name']  ?>'       ></td>
                    </tr>
                    <tr>
                        <th scope="row">分机号：</th>
                        <td><input type="text" name="telphone"  placeholder="ex:6719" value='<?php  echo $result_data['job_id']  ?>' ></td>
                    </tr>
                    <tr>
                        <th scope="row">设备备注：</th>
                        <td><input type="text" name="comments"  placeholder="ex:包含机身、数据线、充电器" value='<?php  echo $result_data['comments']  ?>'  ></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td><input id="fo1" type="submit"  name="submit"  value="&nbsp;提&nbsp;交&nbsp;数&nbsp;据&nbsp;"></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td><a href="./device_manage.php">返回列表页</a> </td>
                    </tr>
                </table>
            </form>

        </div>
    </div>
</div>
</div>
</body>
</html>