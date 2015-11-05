<html>
<head>
    <title>自动编译IOS列表</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;"  />
    <link href="css/addfile_new.css" rel="stylesheet" type="text/css" />

</head>
<body> <div id="bd">
    <div id="title">
    <h4>自动编译IOS列表</h4>
   </div>
  <div id="content">
<table  id="dw"  border="2" >
<tr>
<th>&nbsp;项目&nbsp;</th>
<!--
<th>文件名</th>
-->
<th>&nbsp;平台&nbsp;</th>
<th>编译时间</th>
<th>&nbsp;安装&nbsp;</th>
</tr>


<?php
include('conn_mysql.php');

$sql="select distinct prj_name,platform,add_time from new_auto_ipa  group by prj_name order by add_time desc  ";
$result1=mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result1)){
	
?>
<tr>
<!--	
<td style="line-height:200%" ><?php echo mb_substr($str,0,17,"utf-8") ; ?></td>
-->
	<td style="line-height:200%" ><?php echo $row[prj_name]; ?></td>
<!--
    <td style="line-height:200%" ><?php echo mb_substr($v,0,3,"utf-8")."..."; ?></td>
-->
    <td style="line-height:200%" ><?php echo $row[platform]; ?></td>
    <td style="line-height:200%" ><?php echo $row[add_time]; ?></td>
    <!--
     <td style="line-height:200%" ><a href="itms-services://?action=download-manifesturl=http:192.168.21.13/testAPNS.plist">下载</a></td>
     -->
    <td style="line-height:200%" ><a href="itms-services://?action=download-manifest&url=http:mobapp.vemic.com/auto-plist/<?php echo $row[prj_name];  ?>.plist">安装</a></td>
    <!--
     <a href="./testAPNS.plist">XYZ</a>
     -->

    </tr>

 <?php
 }
?>

</table>
  </div>

    <div id="sheet">
    <hr/>
    <a href="index.php">返回首页</a>
    </div>
</div>
</body>
</html>