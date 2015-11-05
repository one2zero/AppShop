<?php
//在显示登录界面之前，首先判断是否保存了用户登录信息，如果有，则自动登录
header('Content-type: text/html; charset=utf-8');
include('conn_mysql.php');
session_start();
$query="select * from new_user_info where user_name='{$_SESSION['UserName']}' and password='{$_SESSION['Password']}' and power in (2,3)";
$result1=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result1);
if ($row)
{
        //header("url=http://mobapp.vemic.com/manage.php");

}
else{
    header("refresh:1;url=http://mobapp.vemic.com/login.php");
    exit;

}

?>
<html>
<head>
    <title>管理APP</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;"  />
    <link href="css/manage.css" rel="stylesheet" type="text/css" />
</head>
<body id="bd"   >
<div id="index">
    <div id="top">
        <a id="top1" href="index.php">首页</a>
        <a id="top2" href="logout.php">你好：<?php echo $_SESSION['UserName'];  ?>!退出登录</a>
    </div>
    <div id="title" >
        管理APP
    </div>
    <div id="bd1">
        <div id="content1">
            <form  id="fr" action="check.php" enctype="multipart/form-data" method="post" name="upform" >
                <table >
                    <tr>
                        <th scope="row">
                            下载权限：
                        </th>
                        <td><input type="radio" name="release" value="1" required aria-required="true">
                            内测
                            <input type="radio" name="release" value="2" required aria-required="true">
                            私有
							<!--
                            <input type="radio" name="release" value="3" required aria-required="true">
                            预览 </td>
							-->
                    </tr>
                    <tr>
                        <th scope="row">项目名称：</th>
                        <td><select name="project"  >
                            <?php
                            include('conn_mysql.php');
                            $sql="select * from new_config_prj ";
                            $result1=mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_array($result1)){
                                ?>
                                <option value="<?php echo $row[prj_num] ?>"><?php echo $row[prj_name] ?></option>
                                <?php
                            }
                            ?>
                        </select></td>
                    </tr>
                    <tr>
                        <th scope="row">安装平台：</th>
                        <td><input type="radio" name="style" value="iphone" required aria-required="true">
                            iphone
                            <input type="radio" name="style" value="ipad" required aria-required="true">
                            ipad
                            <input type="radio" name="style" value="android" required aria-required="true">
                            Android
                            <input type="radio" name="style" value="android-HD" required aria-required="true">
                            And-HD </td>
                    </tr>
                    <tr>
                        <!--
                        <th scope="row">Bundle identifier(IOS程序必填)：</th>
                        <td><input type="text" name="bid"  placeholder="ex:com.focuschina.xxxx"></td>
                        -->

                    </tr>
                    <tr>
                        <th scope="row"><input id="fo" name="upfile" type="file"></th>
                        <td><input id="fo1" type="submit"  name="submit"  value="&nbsp;上&nbsp;传&nbsp;文&nbsp;件&nbsp;"></td>
                    </tr>
                    <tr>
                        <th scope="row">允许上传的文件后缀为：</th>
                        <td>ipa、apk(注意程序后缀为小写)</td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <div id="del1">

        <a href="auto_build_ios.php">自动编译IOS</a>&nbsp;&nbsp;|&nbsp;<a href="#">自动编译Android</a>
    </div>



    <div id="del2">

        <a href="delete_app.php">删除APP</a>&nbsp;&nbsp;

        <?php

        $query="select * from new_user_info where user_name='{$_SESSION['UserName']}' and password='{$_SESSION['Password']}' and power=3 ";

        $result1=mysqli_query($conn,$query);

        $row=mysqli_fetch_array($result1);

        if($row){

            echo '<a href="adduser.php">添加用户<br><br>';
            echo '<a href="addprj.php">配置项目<br><br>';
            echo '<a href="tail-log.php">Apache日志<br><br>';
            echo '<a href="error-log.php">Error日志<br><br>';

        }


        ?>
    </div>
</div>
</body>
</html>




