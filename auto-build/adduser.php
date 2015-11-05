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
    <title>添加用户</title>
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
        <h2>添加用户</h2>
    </div>
    <div class="content">
        <form  id="fr" action="user_check.php"  method="post" name="upform" >
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
	
    <div class="content">
        <table  id="dw"  border="2" >
            <tr>
                <th>项目</th>
                <th>应用平台</th>
                <th>&nbsp;文件名&nbsp;</th>
                <th>上传时间</th>
                <th>&nbsp;删除&nbsp;</th>
            </tr>
            <?php
            include('conn_mysql.php');
            $sql="select distinct app_name,a.id,project,platform,add_time,prj_name,app_power from new_app_info as a  left join new_config_prj as b on a.project=b.prj_num where  app_status=1 and app_power in (1,2,3) ORDER BY add_time desc ";
            $result1=mysqli_query($conn,$sql);
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
                        <td style="line-height:200%" ><a href="admin_del.php?id=<?php echo $row[id]; ?>">删除</a></td>

                    </tr>

                    <?php
                }
            }
            ?>
        </table>
    </div>
	
    <div id="sheet">
        <hr>
        <a href="index.php">返回首页</a>|<a href="manage.php">返回管理页面</a>

    </div>
</div>
</body>
</html>
