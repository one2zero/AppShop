<?php

//在显示登录界面之前，首先判断是否保存了用户登录信息，如果有，则自动登录

header('Content-type: text/html; charset=utf-8');

include('conn_mysql.php');

session_start();

$query="select * from new_user_info where user_name='{$_SESSION['UserName']}' and password='{$_SESSION['Password']}' and power=3 ";

$result1=mysqli_query($conn,$query);

$row=mysqli_fetch_array($result1);

if ($row)

{

    // header("url=http://mobapp.vemic.com/adduser.php");

}

else{

    echo "你可能没有权限访问该页面！";

    echo '<br>';

    echo '<br>';

    echo "任何疑问请联系：6719.";

    echo '<br>';

    echo '<br>';

    echo "3秒后，返回首页！.";

    header("refresh:1;url=http://mobapp.vemic.com/");

    exit;

}

?>

<html>

<head>

    <title>配置项目</title>

    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;"  />

    <link href="css/addfile.css" rel="stylesheet" type="text/css" />

</head>

<body>

<div id="bd" >
    <div id="top">

        <a id="top1" href="index.php">首页</a>

        <a id="top2" href="logout.php">你好：<?php echo $_SESSION['UserName'];  ?>!退出登录</a>

    </div>

    <div id ="title">

        <h2>配置项目</h2>

    </div>

    <div class="content">

        <form  id="fr" action="addprj_check.php"  method="post" name="upform" >

            <table >

                <tr>

                    <th scope="row">选择用户：</th>
                        <td><select name="project"  >
                            <?php
                            include('conn_mysql.php');
                            $sql="select * from new_user_info ";
                            $result1=mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_array($result1)){
                                ?>
                                <option value="<?php echo $row[id] ?>"><?php echo $row[user_name] ?></option>
                                <?php
                            }
                            ?>
                        </select></td>
                </tr>
                <tr>
                    <th scope="row">
                        安装平台：
                    </th>
                    <td><input type="radio" name="platform" value="1" required aria-required="true">
                        IOS
                        <input type="radio" name="platform" value="2" required aria-required="true">
                        Android
                    </td>
                </tr>
                <tr>
                    <th scope="row">工&nbsp;程&nbsp;名：</th>
                    <td><input type="text" name="uid" required aria-required="true" placeholder="ex:TM"></td>
                </tr>

                <tr>
                    <th scope="row">
                        编译类型：
                    </th>
                    <td><input type="radio" name="release" value="1" required aria-required="true">
                        Project
                        <input type="radio" name="release" value="2" required aria-required="true">
                        Workspace
                    </td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td><input id="fo1" type="submit"  name="submit"  value="提交数据"></td>
                </tr>
            </table>
        </form>
    </div>
    <div id="sheet">

        <hr>

        <a href="index.php">返回首页</a>|<a href="manage.php">返回管理页面</a>



    </div>

</div>

</body>

</html>


