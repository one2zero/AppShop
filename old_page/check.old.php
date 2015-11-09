﻿<?php
//在显示登录界面之前，首先判断是否保存了用户登录信息，如果有，则自动登录
header('Content-type: text/html; charset=utf-8');
include('conn_mysql.php');
session_start();
?>
<html>
<head>
    <title>移动APP服务器</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;"  />
    <link href="css/addfile_new.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="bd">
    <div id="title">
        <h2>移动APP服务器</h2>
    </div>
<div  id="content">
<?php
   // include('local_ip.php');
header('Content-type: text/html; charset=utf-8');
// 定义一个函数getIP()
function getIP()
{
    global $ip;
    if (getenv("HTTP_CLIENT_IP"))
        $ip = getenv("HTTP_CLIENT_IP");
    else if(getenv("HTTP_X_FORWARDED_FOR"))
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    else if(getenv("REMOTE_ADDR"))
        $ip = getenv("REMOTE_ADDR");
    else $ip = "Unknow";
    return $ip;
}
 $ipd=getIP();

    if($_POST['submit']){
        $app_name1 = $_FILES["upfile"]['name'];
        include('conn_mysql.php');
        $sql="select distinct app_name  from new_app_info  where app_name= '$app_name1' and app_status=1 and app_power in (1,2,3)  ";
        $result1=mysqli_query($conn,$sql);
      @ $row = mysqli_fetch_array($result1);
        if($app_name1==$row[app_name]){
            echo '<br/>';
            echo '<br/>';
            echo "上传失败！";
            echo '<br/>';
            echo $app_name1;
            echo '<br/>';
            echo "该APP已经存在，请先删除后，再试一次";
            echo '<br/>';
            echo '<br/>';
            echo '<a href="manage.php">返回</a>';
            exit;
        }
        $ar=explode('.',$app_name1);
        $lcy=count($ar);
       if($_POST[style] ==''){
            echo '<br/>';
            echo '<br/>';
            echo "上传失败！";
            echo '<br/>';
            echo '<br/>';
            echo "请选择安装平台！";
            echo '<br/>';
            echo '<br/>';
            echo '<a href="manage.php">返回</a>';
            exit;
        }
        if($ar[$lcy-1] =="ipa"){
            if(trim($_POST[bid])==''){
                echo '<br/>';
                echo '<br/>';
                echo "上传失败！";
                echo '<br/>';
                echo '<br/>';
                echo "IOS程序Bundle identifier必须正确填写！";
                echo '<br/>';
                echo '<br/>';
                echo '<a href="manage.php">返回</a>';
                exit;

            }
        }
        if($ar[$lcy-1] =="ipa" || $ar[$lcy-1]=="apk"){
        }
        else{
            echo '<br/>';
            echo '<br/>';
            echo "上传失败！";
            echo '<br/>';
            echo '<br/>';
            echo "文件类型不正确，请选择正确的文件类型！";
            echo '<br/>';
            echo '<br/>';
            echo '<a href="manage.php">返回</a>';
            exit;
        }


    }
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (!is_uploaded_file($_FILES["upfile"]['tmp_name']))
    {
        echo "上传失败！";
        echo '<br/>';
        echo '<br/>';
        echo "请选择要上传的文件！";
        echo '<br/>';
        echo '<br/>';
        echo '<a href="manage.php">返回</a>';
        exit;
    }
    if($_POST['release']=="1"){
        if($ar[$lcy-1] =="ipa")
        {
            $destination_folder="./new_app/pub_ipa/"; //上传文件路径
            $file = $_FILES["upfile"];
            $filename=$file["tmp_name"];
            $pinfo=pathinfo($file["name"]);
            $ftype=$pinfo['basename'];
            $destination = $destination_folder.$ftype;
            if(!move_uploaded_file ($filename, $destination))
            {
                echo "移动文件出错";
                exit;
            }
            //生成plist文件
            $address="new_app/pub_ipa";
            $fp=fopen("model.plist","r"); //只读打开模板
            $str=fread($fp,filesize("model.plist"));//读取模板中内容
            // $str=str_replace("{ip_add}",$ip,$str);
            $str=str_replace("{fileupload}",$address,$str);
            $str=str_replace("{app_name}",$app_name1,$str);
            $str=str_replace("{version}",$_POST[version],$str);//替换内容
            $str=str_replace("{focusbid}",trim($_POST[bid]),$str);//替换内容
            $str=str_replace("{appname}",$app_name1,$str);

            fclose($fp);
            $add="./new_app/pub_plist/";
            $na=explode('.',$app_name1);
            $su=array_pop($na);
            $string = implode('.',$na);
            $handle=fopen($add.$string.'.plist',"w"); //写入方式打开新闻路径
            if(fwrite($handle,$str)){ //把刚才替换的内容写进生成的HTML文件
                fclose($handle);
            }
            else{
                echo "Plist文件生成失败！";
                exit;
            }

        }
        else{
        $destination_folder="./new_app/pub_apk/"; //上传android文件路径
        $file = $_FILES["upfile"];
        $filename=$file["tmp_name"];
        $pinfo=pathinfo($file["name"]);
        $ftype=$pinfo['basename'];
        $destination = $destination_folder.$ftype;
        if(!move_uploaded_file ($filename, $destination))
        {
            echo "移动文件出错";
            exit;
        }
    }
    }
    if($_POST['release']=="2"){
        if($ar[$lcy-1] =="ipa")
        {
            $destination_folder="./new_app/pri_ipa/"; //上传文件路径
            $file = $_FILES["upfile"];
            $filename=$file["tmp_name"];
            $pinfo=pathinfo($file["name"]);
            $ftype=$pinfo['basename'];
            $destination = $destination_folder.$ftype;
            if(!move_uploaded_file ($filename, $destination))
            {
                echo "移动文件出错";
                exit;
            }
            //生成plist文件
            $address="new_app/pri_ipa";
            $fp=fopen("model.plist","r"); //只读打开模板
            $str=fread($fp,filesize("model.plist"));//读取模板中内容
            // $str=str_replace("{ip_add}",$ip,$str);
            $str=str_replace("{fileupload}",$address,$str);
            $str=str_replace("{app_name}",$app_name1,$str);
            $str=str_replace("{version}",$_POST[version],$str);//替换内容
            $str=str_replace("{focusbid}",trim($_POST[bid]),$str);//替换内容
            $str=str_replace("{appname}",$app_name1,$str);

            fclose($fp);
            $add="./new_app/pri_plist/";
            $na=explode('.',$app_name1);
            $su=array_pop($na);
            $string = implode('.',$na);
            $handle=fopen($add.$string.'.plist',"w"); //写入方式打开新闻路径
            if(fwrite($handle,$str)){ //把刚才替换的内容写进生成的HTML文件
                fclose($handle);
            }
            else{
                echo "Plist文件生成失败！";
                exit;
            }

        }
        else{
            $destination_folder="./new_app/pri_apk/"; //上传android文件路径
            $file = $_FILES["upfile"];
            $filename=$file["tmp_name"];
            $pinfo=pathinfo($file["name"]);
            $ftype=$pinfo['basename'];
            $destination = $destination_folder.$ftype;
            if(!move_uploaded_file ($filename, $destination))
            {
                echo "移动文件出错";
                exit;
            }
        }
    }
    if($_POST['release']=="3"){
        if($ar[$lcy-1] =="ipa")
        {
            $destination_folder="./new_app/pre_ipa/"; //上传文件路径
            $file = $_FILES["upfile"];
            $filename=$file["tmp_name"];
            $pinfo=pathinfo($file["name"]);
            $ftype=$pinfo['basename'];
            $destination = $destination_folder.$ftype;
            if(!move_uploaded_file ($filename, $destination))
            {
                echo "移动文件出错";
                exit;
            }
            //生成plist文件
            $address="new_app/pre_ipa";
            $fp=fopen("model.plist","r"); //只读打开模板
            $str=fread($fp,filesize("model.plist"));//读取模板中内容
            // $str=str_replace("{ip_add}",$ip,$str);
            $str=str_replace("{fileupload}",$address,$str);
            $str=str_replace("{app_name}",$app_name1,$str);
            $str=str_replace("{version}",$_POST[version],$str);//替换内容
            $str=str_replace("{focusbid}",trim($_POST[bid]),$str);//替换内容
            $str=str_replace("{appname}",$app_name1,$str);

            fclose($fp);
            $add="./new_app/pre_plist/";
            $na=explode('.',$app_name1);
            $su=array_pop($na);
            $string = implode('.',$na);
            $handle=fopen($add.$string.'.plist',"w"); //写入方式打开新闻路径
            if(fwrite($handle,$str)){ //把刚才替换的内容写进生成的HTML文件
                fclose($handle);
            }
            else{
                echo "Plist文件生成失败！";
                exit;
            }

        }
        else{
            $destination_folder="./new_app/pre_apk/"; //上传android文件路径
            $file = $_FILES["upfile"];
            $filename=$file["tmp_name"];
            $pinfo=pathinfo($file["name"]);
            $ftype=$pinfo['basename'];
            $destination = $destination_folder.$ftype;
            if(!move_uploaded_file ($filename, $destination))
            {
                echo "移动文件出错";
                exit;
            }
        }
    }
    //插入数据
    include('conn_mysql.php');
    $app_name = $_FILES["upfile"]['name'];
    $sql="insert into new_app_info (id,project,platform,version,app_name,app_status,app_power,add_time,add_name,add_ip,del_name,del_time) values('','$_POST[project]','$_POST[style]','','$app_name','1','$_POST[release]',now(),'$_SESSION[UserName]','$ipd','','')";
    if(  $result=mysqli_query($conn,$sql)){
        echo '<script>alert("恭喜！您的文件上传成功!")</script>';
      }
    else{
        echo "数据插入失败！";
        echo '<hr/>';
        echo '<a href="index.php">返回首页</a>';
        echo '<a href="manage.php">继续上传</a>';
        exit;
    }

}
?>
</div>
    <div id="sheet">
        <hr/>
        <a href="index.php">返回首页</a>
        <a href="manage.php">继续上传</a>
    </div>
</div>
</body>
</html>