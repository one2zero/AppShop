<?php
//在显示登录界面之前，首先判断是否保存了用户登录信息，如果有，则自动登录
header('Content-type: text/html; charset=utf-8');

include('conn_mysql.php');

session_start();

?>

<html>

<head>

    <title>配置项目</title>

    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;"  />

    <link href="css/addfile_new.css" rel="stylesheet" type="text/css" />

</head>

<body>

<div id="bd">
    <div id="top">

        <a id="top1" href="index.php">首页</a>

        <a id="top2" href="logout.php">你好：<?php echo $_SESSION['UserName'];  ?>!退出登录</a>

    </div>
    <div id="title">
        <h2>配置项目</h2>
    </div>
    <div  id="content">
        <?php
        if($_POST['submit']){

            if($_POST[project] ==''){

                echo '<br/>';

                echo '<br/>';

                echo "添加失败！";

                echo '<br/>';

                echo '<br/>';

                echo "请选择用户！";

                echo '<br/>';

                echo '<br/>';

                echo '<a href="addprj.php">返回修改</a>';

                exit;

            }
            if($_POST[platform] ==''){

                echo '<br/>';

                echo '<br/>';

                echo "添加失败！";

                echo '<br/>';

                echo '<br/>';

                echo "请选择安装平台！";

                echo '<br/>';

                echo '<br/>';

                echo '<a href="addprj.php">返回修改</a>';

                exit;

            }
            if($_POST[uid] ==''){

                echo '<br/>';

                echo '<br/>';

                echo "添加失败！";

                echo '<br/>';

                echo '<br/>';

                echo "请输入工程名称！";

                echo '<br/>';

                echo '<br/>';

                echo '<a href="addprj.php">返回修改</a>';

                exit;

            }
            if($_POST[release] ==''){

                echo '<br/>';

                echo '<br/>';

                echo "添加失败！";

                echo '<br/>';

                echo '<br/>';

                echo "请选择编译类型！";

                echo '<br/>';

                echo '<br/>';

                echo '<a href="addprj.php">返回修改</a>';

                exit;

            }
            include('conn_mysql.php');
            $sql="select a.app_name,a.user_id  from new_auto_build a ,new_user_info b  where a.user_id=b.id and a.app_name='$_POST[uid]' and b.user_name='$_SESSION[UserName]' ";
            $result1=mysqli_query($conn,$sql);
            @ $row = mysqli_fetch_array($result1);
            if($_POST[uid]==$row[app_name] && $_POST[project]==$row[user_id] ){
                echo '<br/>';
                echo '<br/>';
                echo "配置项目失败！";
                echo '<br/>';
                echo '<br/>';
                echo "已经添加过该项目信息，请确认！";
                echo '<br/>';
                echo '<br/>';
                echo '<a href="manage.php">返回</a>';
                exit;
            }



            $sql="insert into new_auto_build (id,user_id,app_platform,app_name,build_type,app_svn,app_system) values ('','$_POST[project]','$_POST[platform]','$_POST[uid]','$_POST[release]','0','0')";
            $result=mysqli_query($conn,$sql);
            if( $result ){
                echo '<script>alert("恭喜！配置项目成功!")</script>';
            }

            else{
                echo "数据插入失败！";
                echo '<hr/>';
                echo '<a href="adduser.php">返回修改</a>';
                exit;
            }
        }

        else{

            echo '<br/>';

            echo '<br/>';

            echo "添加失败！";

            echo '<br/>';

            echo '<br/>';

            echo '<br/>';

            echo '<br/>';

            echo '<a href="addprj.php">返回</a>';

            exit;

        }

        ?>

    </div>

    <div id="sheet">

        <hr/>
        <a href="index.php">返回首页</a>|<a href="manage.php">返回管理页面</a> 
    </div>

</div>

</body>

</html>
