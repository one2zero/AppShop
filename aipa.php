<html>
<head>
    <title>自动编译IOS列表<</title>
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
            <!--
            <th>&nbsp;项目&nbsp;</th>
            -->
            <th>文件名</th>
            <th>&nbsp;平台&nbsp;</th>
            <th>上传时间</th>
            <th>&nbsp;安装&nbsp;</th>
        </tr>
        <?php
        header('Content-type: text/html; charset=utf-8');
        $path = './auto-ipa-build';
        $h = scandir($path);
        foreach($h as $v){
            $name=explode('.',$v);
            $me=$name[0];
            $su=array_pop($name);
            $str = implode('.',$name);
            if($v != '.' and $v!= '..'){
                if(is_file($path.'/'.$v)){
                    if($me !=''){
                    //echo $v;
                    $da=date("M d Y H:i:s.", filemtime($path.'/'.$v));
                    // echo $da;
                    ?>
                    <tr>
                        <!--
                        <td style="line-height:200%" ><?//php echo mb_substr($str,0,17,"utf-8"); ?></td>
                        -->
                        <td style="line-height:200%" ><?php echo $v; ?></td>
                        <td style="line-height:200%" ><?php echo "ios"; ?></td>
                        <td style="line-height:200%" ><?php echo mb_substr($da,11,20,"utf-8"); ?></td>
                        <!--
                        <td style="line-height:200%" ><a href="itms-services://?action=download-manifesturl=http:192.168.21.13/testAPNS.plist">下载</a></td>
                        -->
                        <td style="line-height:200%" ><a href="itms-services://?action=download-manifest&url=http:mobapp.vemic.com/auto-plist/<?php echo $str;  ?>.plist">安装</a></td>
                        <!--
                        <a href="./testAPNS.plist">XYZ</a>
                        -->

                    </tr>

                        <?php
                    }

                }
            }
        }
        ?>

    </table>
    </div>
    <?php
//$file = 'ip.php';
//$da=date('r', filemtime($file));
//echo $da ;
    ?>
    <div id="sheet">
    <hr/>
    <a href="index.php">返回首页</a>
    </div>
</div>
</body>
</html>