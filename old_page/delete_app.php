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
   // header("url=http://mobapp.vemic.com/delete_app.php");
}
else{
    echo "你可能没有权限访问该页面！";
    echo '<br>';
    echo '<br>';
    echo "任何疑问请联系：6719.";
    echo '<br>';
    echo '<br>';
    echo "3秒后，返回首页！.";
    header("refresh:3;url=http://mobapp.vemic.com/");
    exit;
}
?>

<html>
<head>
    <title>删除APP</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;"  />
    <link href="css/addfile_new.css" rel="stylesheet" type="text/css" />
</head>
<body> <div id="bd">
    <div id="top">

        <a id="top1" href="index.php">首页</a>

        <a id="top2" href="logout.php">你好：<?php echo $_SESSION['UserName'];  ?>!退出登录</a>

    </div>
    <div id="title">
        <h4>删除APP</h4>
    </div>
    <div id="content">
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
            $sql="select distinct app_name,a.id,project,platform,add_time,prj_name,app_power from new_app_info as a  left join new_config_prj as b on a.project=b.prj_num where  app_status=1 and app_power in (1,2,3) and add_name ='{$_SESSION['UserName']}' ORDER BY add_time desc ";
        @   $result1=mysqli_query($conn,$sql);
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
                        <?php
                        if($ex[$num-1]=="ipa"){
                            $su=array_pop($ex);
                            $str = implode('.',$ex);
                            $ipa= "itms-services://?action=download-manifest&url=http:192.168.21.89/new_app/pub_plist/";
                            $plist=$str.".plist";
                            $down=$ipa.$plist;

                        }
                        else{
                            $down="new_app/pub_apk/".$v;
                        }
                        ?>
                        <!--
                <td style="line-height:200%" ><a href="itms-services://?action=download-manifest&url=http:192.168.21.13/plist/<?php //echo $str ?>.plist">安装</a></td>

                <td style="line-height:200%" ><a href="auto-adroidfile/<?php echo $v ?>">安装</a></td>
 -->
                        <td style="line-height:200%" ><a href="del_detail.php?id=<?php echo $row[id]; ?>">删除</a></td>

                    </tr>

                    <?php
                }
            }
            ?>
        </table>
    </div>
    <div id="sheet">
        <hr/>
        <a href="index.php">返回首页</a>|<a href="manage.php">上一页</a>
    </div>
</div>
</body>
</html>
