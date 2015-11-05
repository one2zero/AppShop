<html>
<head>
    <title>预览应用</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;"  />
    <link href="css/addfile_new.css" rel="stylesheet" type="text/css" />
</head>
<body> <div id="bd">
    <div id="title">
        <h4>预览应用</h4>
    </div>
    <div id="content">
        <table  id="dw"  border="2" >
            <tr>
                <!--
                <th>项目</th>
                -->
                <th>应用平台</th>
                <th>&nbsp;文件名&nbsp;</th>
                <th>上传时间</th>
                <th>&nbsp;安装&nbsp;</th>
            </tr>
            <?php
            include('conn_mysql.php');
            $sql="select distinct app_name,project,platform,add_time,prj_name from new_app_info as a  left join new_config_prj as b on a.project=b.prj_num where  app_status=1 and app_power=3 ORDER BY project asc,platform asc ";
            $result1=mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($result1)){
                $v=$row[app_name];
                $ex=explode('.',$v);
                $num=count($ex);
                if($ex[0]!=''){
                    ?>
                    <tr>
                        <!--
                        <td style="line-height:200%" ><?php echo $row[prj_name]; ?></td>
                        -->
                        <td style="line-height:200%" ><?php echo $row[platform]; ?></td>
                        <!--
                        <td style="line-height:200%" ><?php echo mb_substr($v,0,3,"utf-8")."..."; ?></td>
                        -->
                        <td style="line-height:200%" ><?php echo $v ; ?></td>
                        <td style="line-height:200%" ><?php echo mb_substr($row[add_time],5,5,"utf-8"); ?></td>
                        <?php
                        if($ex[$num-1]=="ipa"){
                            $su=array_pop($ex);
                            $str = implode('.',$ex);
                            $ipa= "itms-services://?action=download-manifest&url=http:192.168.21.89/new_app/pre_plist/";
                            $plist=$str.".plist";
                            $down=$ipa.$plist;

                        }
                        else{
                            $down="new_app/pre_apk/".$v;
                        }
                        ?>
                        <!--
                <td style="line-height:200%" ><a href="itms-services://?action=download-manifest&url=http:192.168.21.13/plist/<?php //echo $str ?>.plist">安装</a></td>

                <td style="line-height:200%" ><a href="auto-adroidfile/<?php echo $v ?>">安装</a></td>
 -->
                        <td style="line-height:200%" ><a href="<?php echo $down ?>">安装</a></td>
                    </tr>

                    <?php
                }
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
