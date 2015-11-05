<?php
//在显示登录界面之前，首先判断是否保存了用户登录信息，如果有，则自动登录
/*
header('Content-type: text/html; charset=utf-8');
include('conn_mysql.php');
session_start();
*/
?>
<html>
<head>
    <title>测试plist生成</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;"  />
    <link href="css/addfile_new.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="bd">
    <div id="title">
        <h2>测试plist生成</h2>
    </div>
<div  id="content">
<?php
header('Content-type: text/html; charset=utf-8');
#passthru("/Users/zhaojia/lichuangye/safedir/test-plist");
#exec("/Users/zhaojia/lichuangye/safedir/test-plist",$ret,$output);

exec("/Users/zhaojia/lichuangye/safedir/test-plist",$ret,$output);

//echo $output;

if($output==0){
	echo "生成成功！";
}
else{
	echo "失败！";
}

$ret=0;
echo '<br>';
print_r($ret);
  

?>
</div>
    <div id="sheet">
        <hr/>
        <a href="index.php">返回首页</a>
        <a href="addfile.php">继续上传</a>
    </div>
</div>
</body>
</html>