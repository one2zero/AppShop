<?php
//在显示登录界面之前，首先判断是否保存了用户登录信息，如果有，则自动登录
header('Content-type: text/html; charset=utf-8');
include('../conn_mysql.php');
session_start();
$query="select * from new_user_info where user_name='{$_SESSION['UserName']}' and password='{$_SESSION['Password']}' and power in (2,3)";
$result1=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result1);
if ($row)
{
   
}
else{
    header("refresh:1;url=http://mobapp.vemic.com/login.php");
    exit;
}
?>
<html>
<head>
    <title>自动编译IOS</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;"  />
    <link href="../css/manage.css" rel="stylesheet" type="text/css" />
</head>
<body id="bd"   >
<div id="index">
    <div id="top">

        <a id="top1" href="index.php">首页</a>

        <a id="top2" href="../logout.php">你好：<?php echo $_SESSION['UserName'];  ?>!退出登录</a>

    </div>
    <div id="title" >
        自动编译IOS
    </div>
    <div id="bd1">
        <div id="content1">
            <form  id="fr" action="./auto_ios_check.php" enctype="multipart/form-data" method="post" name="upform" >
                <table >
                    <!--
                    <tr>
                        <th scope="row">
                            下载权限：
                        </th>
                        <td><input type="radio" name="release" value="1" required aria-required="true">
                            内测
                            <input type="radio" name="release" value="2" required aria-required="true">
                            私有
                            <input type="radio" name="release" value="3" required aria-required="true">
                            预览 </td>
                    </tr>
                    -->
						<!--
                    <tr>
                        <th scope="row">项目名称：</th>
                        <td><select name="project"  >
                            <?php
							/*
                            include('conn_mysql.php');
                            $sql="select * from new_config_prj ";
                            $result1=mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_array($result1)){
                                ?>
                                <option value="<?php echo $row[prj_num] ?>"><?php echo $row[prj_name] ?></option>
                                <?php
                            }
							*/
                            ?>
                        </select></td>
                    </tr>
					-->
                    <tr>
                        <th scope="row">安装平台：</th>
                        <td><input type="radio" name="style" value="iphone" required aria-required="true">
                            iphone
                            <input type="radio" name="style" value="ipad" required aria-required="true">
                            ipad
							<!--
                            <input type="radio" name="style" value="android" required aria-required="true">
                            Android
                            <input type="radio" name="style" value="android-HD" required aria-required="true">
                            And-HD </td>
							-->
                    </tr>
                    <tr>
                        <th scope="row">工程名称：</th>
                        <td><select name="project"  >
                            <?php
                            include('../conn_mysql.php');
                            $sql="select * from new_auto_build a,new_user_info b where a.user_id=b.id and b.user_name='$_SESSION[UserName]' ";
                       @     $result1=mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_array($result1)){
                                ?>
                                <option value="<?php echo $row[app_name] ?>"><?php echo $row[app_name] ?></option>
                                <?php
                            }
                            ?>
                        </select>-Info.plist</td>
                    </tr>
                    <tr>
                        <th scope="row">项目SVN路径：</th>
                        <td><input type="text" name="svn"  size="70"  placeholder="ex:http://192.168.16.81:58760/svn/MOBAPP/TM/IOS/trunk/TM_Internal"></td>
                    </tr>
                    <tr>
                        <th scope="row">SVN路径填写要求：</th>
                        <td>.xcodeproj文件的上一级目录</td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td><input id="fo1" type="submit"  name="submit"  value="&nbsp;提&nbsp;交&nbsp;编&nbsp;译&nbsp;"></td>
                    </tr>
					
                </table>
            </form>
        </div>
    </div>
    <div id="sheet">
        <hr>
        <a href="../index.php">返回首页</a>|<a href="../member/membercenter.php">返回管理页面</a>

    </div>
</div>
</body>
</html>
<?php
include('../conn_mysql.php');
$sql="select *  from new_count_num ";
$result1=mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result1);
$index=$row[auto_ios] +1;
$sql="update new_count_num set auto_ios= $index ";
$result1=mysqli_query($conn,$sql);

?>



