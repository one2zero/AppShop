<?php
//在显示登录界面之前，首先判断是否保存了用户登录信息，如果有，则自动登录
header('Content-type: text/html; charset=utf-8');

include('conn_mysql.php');

session_start();

?>

<html>

<head>

    <title>添加用户</title>

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

    <h2>添加用户</h2>

</div>

<div  id="content">

<?php

if($_POST['submit']){

    if($_POST[rol] ==''){

        echo '<br/>';

        echo '<br/>';

        echo "添加失败！";

        echo '<br/>';

        echo '<br/>';

        echo "请选择用户角色！";

        echo '<br/>';

        echo '<br/>';

        echo '<a href="adduser.php">返回修改</a>';

        exit;

    }

    if($_POST[release] ==''){

        echo '<br/>';

        echo '<br/>';

        echo "添加失败！";

        echo '<br/>';

        echo '<br/>';

        echo "请选择用户权限！";

        echo '<br/>';

        echo '<br/>';

        echo '<a href="adduser.php">返回修改</a>';

        exit;

    }

    if($_POST[uid] ==''){

        echo '<br/>';

        echo '<br/>';

        echo "添加失败！";

        echo '<br/>';

        echo '<br/>';

        echo "请输入用户名！";

        echo '<br/>';

        echo '<br/>';

        echo '<a href="adduser.php">返回修改</a>';

        exit;

    }

    if($_POST[pid] ==''){

        echo '<br/>';

        echo '<br/>';

        echo "添加失败！";

        echo '<br/>';

        echo '<br/>';

        echo "请输入用户密码！";

        echo '<br/>';

        echo '<br/>';

        echo '<a href="adduser.php">返回修改</a>';

        exit;

    }

    include('conn_mysql.php');

    $sql="select user_name from new_user_info where user_name='$_POST[uid]'";

    $result=mysqli_query($conn,$sql);

 @   $row = mysqli_fetch_array($result1);

    if($row[user_name]=='$_POST[uid]'){

        echo '<br/>';

        echo '<br/>';

        echo "已经存在该用户，不能添加重复数据！";

        echo '<br/>';

        echo '<br/>';

        echo '<a href="adduser.php">返回修改</a>';

        exit;

    }

    $sql="insert into new_user_info (id,user_name,password,state,role,power,NumLoginFail,LastLogin,add_time,add_name) values ('','$_POST[uid]','$_POST[pid]',1,'$_POST[rol]','$_POST[release]',0,now(),now(),'$_SESSION[UserName]')";

    $result=mysqli_query($conn,$sql);

    if( $result ){



        echo '<script>alert("恭喜！添加用户成功!")</script>';

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

    echo '<a href="adduser.php">返回</a>';

    exit;

}

?>

</div>

<div id="sheet">

    <hr/>

    <a href="adduser.php">继续添加</a>

</div>

</div>

</body>

</html>
