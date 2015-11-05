<?php
//在显示登录界面之前，首先判断是否保存了用户登录信息，如果有，则自动登录
header('Content-type: text/html; charset=utf-8');
?>
<html>
<head>
    <title>Apache日志</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;"  />
    <link href="css/addfile.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="bd" >
    <div id ="title">
        <h2>Apache日志</h2>
    </div>
    <div id="sheet">
        <?php
		//$file_name="/Applications/XAMPP/xamppfiles/logs/access_log";
		//if(is_file($file_name)){
		//	$cn=file_get_contents($file_name);
		//	echo $cn;
		//	echo '<br/>';
		//}
		$f=fopen("/Applications/XAMPP/xamppfiles/logs/access_log","r");
		$num=1;
		while(!feof($f)){
			$num=$num+1;
			$line=fgets($f);
			echo $num."::".$line;
			echo '<br/>';
		}
        ?>

           <a href="index.php">返回首页</a><br><br>
     
          <a href="./member/membercenter.php">管理中心</a><br><br>
    </div>
</div>
</body>
</html>

