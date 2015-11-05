<html>
<head>
    <title>Android程序列表</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;"  />
    <link href="css/addfile_new.css" rel="stylesheet" type="text/css" />

</head>
<body> <div id="bd">
    <div id="title">
        <h4> Android程序列表</h4>
     </div>
    <div id="content">
    <table  id="dw"  border="2" >
        <tr>
            <th>&nbsp;项目&nbsp;</th>
            <th>&nbsp;文件名&nbsp;</th>
            <th>&nbsp;平台&nbsp;</th>
            <th>上传时间</th>
            <th>&nbsp;安装&nbsp;</th>
        </tr>
        <?php
       // header("Content-type:text/html;charset=utf-8");
        include('conn_mysql.php');
        $path = './adroidfile';
        $h = scandir($path);
        foreach($h as $v){
            $ex=explode('.',$v);
            $su=array_pop($ex);
            $str = implode('.',$ex);
            if($v != '.' and $v!= '..'){
                if(is_file($path.'/'.$v)){
                    if($ex[0]!=''){
                    $sql="select project,platform,add_time from add_app where app_name='$v' ORDER BY add_time DESC LIMIT 1 ";
                    $result1=mysqli_query($conn,$sql);
                    $re=mysqli_fetch_array($result1);

                    switch($re[project]){
                        case 1:
                            $va="新一站";
                            break;
                        case 2:
                            $va="TYP";
                            break;
                        case 3:
                            $va="买家版";
                            break;
                        case 4:
                            $va="麦通";
                            break;
                        case 5:
                            $va="班车";
                            break;
                        case 6:
                            $va="FM1";
                            break;
                        case 7:
                            $va="FM2";
                            break;
                        case 8:
                            $va="FM3";
                            break;
                        case 9:
                            $va="旅行箱";
                            break;
                        case 10:
                            $va="焦点视界";
                            break;
                        case 11:
                            $va="中国制造之美";
                            break;
                    }
                    ?>
                    <tr>
                        <td style="line-height:200%" ><?php echo $va; ?></td>
                        <td style="line-height:200%" ><?php echo mb_substr($v,0,3,"utf-8")."..."; ?></td>
                        <td style="line-height:200%" ><?php echo $re[platform]; ?></td>
                        <td style="line-height:200%" ><?php echo mb_substr($re[add_time],0,10,"utf-8"); ?></td>
                        <!--
                        <td style="line-height:200%" ><a href="itms-services://?action=download-manifesturl=http:192.168.21.13/testAPNS.plist">下载</a></td>
                        -->
                        <td style="line-height:200%" ><a href="/adroidfile/<?php echo $v ?>">安装</a></td>
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
    <div id="sheet">
    <hr/>
    <a href="index.php">返回首页</a>
    </div>
</div>
</body>
</html>