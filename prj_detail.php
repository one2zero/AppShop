<?php
error_reporting(0);
include('conn_mysql.php');
$prj=$_GET['id'];
$sql="select prj_name from new_config_prj where prj_num=$prj   ";
$result1=mysqli_query($conn,$sql);
$prj_title = mysqli_fetch_array($result1);
?>
<html>
<head>
    <title><?php echo $prj_title[prj_name] ?>应用列表</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;"  />
    <link href="css/addfile_new.css" rel="stylesheet" type="text/css" />
</head>
<body> <div id="bd">
    <div id="title">
        <h4><?php echo $prj_title[prj_name] ?>应用列表</h4>
    </div>
<div id="content">
<table  id="dw"  border="2" >
<tr>
<th>应用平台</th>
<th>&nbsp;文件名&nbsp;</th>
<th>&nbsp;MD5&nbsp;</th>
<th>上传人</th>
<th>上传时间</th>
<th>&nbsp;下载&nbsp;</th>
</tr>
<?php
    $sql="select distinct app_name,platform,add_time,add_name from new_app_info where project=$prj and app_status=1 and app_power=1  ORDER BY platform asc ";
  @  $result1=mysqli_query($conn,$sql);
 while($row = mysqli_fetch_array($result1)){
//while($row = mysqli_fetch_assoc($result1)){
    $v=$row[app_name];
    $user=$row[add_name];
    $ex=explode('.',$v);
    $num=count($ex);
    if($ex[$num-1]=="ipa"){
        // $ServerUrl=$_SERVER['DOCUMENT_ROOT'];
        // $su=array_pop($ex);
        // $str = implode('.',$ex);
        // $ipa= "itms-services://?action=download-manifest&url=https:localhost/AppShop/new_app/pub_plist/";
        // $plist=$str.".plist";
        // $down=$ipa.$plist;
        $down="../new_app/pub_ipa/".$v;

    }
    else{
        $down="../new_app/pub_apk/".$v;
    }
    $md5file = md5_file($down);
    if($ex[0]!=''){
                ?>
            <tr>
                <td style="line-height:200%" ><?php echo $row[platform]; ?></td>
                <!--
                <td style="line-height:200%" ><?php echo mb_substr($v,0,3,"utf-8")."..."; ?></td>
                -->
                <td style="line-height:200%" ><?php echo $v; ?></td>
                <td style="line-height:200%" ><?php echo $md5file; ?></td>
                <td style="line-height:200%" ><?php echo $user; ?></td>
                <td style="line-height:200%" ><?php echo mb_substr($row[add_time],0,10,"utf-8"); ?></td>
                
<!--
//                <td style="line-height:200%" ><a href="itms-services://?action=download-manifest&url=http:192.168.21.13/plist/<?php //echo $str ?>.plist">安装</a></td>

//                <td style="line-height:200%" ><a href="auto-adroidfile/<?php echo $v ?>">安装</a></td>
 -->
                <td style="line-height:200%" ><a href="<?php echo $down ?>">下载</a></td>
            </tr>

            <?php
            }
}
?>
</table>
</div>
    <div id="sheet">
        <hr/>
        <a href="index.php">返回首页</a>|<a href="prj_list.php">列表页面</a>|<a href="/AppShop/new_app/server.crt">下载证书</a>
    </div>
  </div>
</body>
</html>
