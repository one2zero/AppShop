<?php
//在显示登录界面之前，首先判断是否保存了用户登录信息，如果有，则自动登录
header('Content-type: text/html; charset=utf-8');

include('../conn_mysql.php');
session_start();
?>

<html>

<head>

    <title>自动编译IOS</title>

    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;"  />

    <link href="../css/addfile_new.css" rel="stylesheet" type="text/css" />

</head>

<body>

<div id="bd">
<div id="top">

    <a id="top1" href="index.php">首页</a>

    <a id="top2" href="../logout.php">你好：<?php echo $_SESSION['UserName'];  ?>!退出登录</a>

</div>

<div id="title">

    <h2>自动编译IOS</h2>

</div>

<div  id="content">

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if($_POST['submit']){
    if($_POST[style] ==''){

        echo '<br/>';

        echo '<br/>';

        echo "编译失败！";

        echo '<br/>';

        echo '<br/>';

        echo "请选择安装平台！";

        echo '<br/>';

        echo '<br/>';

        echo '<a href="./auto_build_ios.php">返回</a>';

        exit;

    }
    if($_POST[project] ==''){

        echo '<br/>';

        echo '<br/>';

        echo "编译失败！";

        echo '<br/>';

        echo '<br/>';

        echo "请选择工程名称！";

        echo '<br/>';

        echo '<br/>';

        echo '<a href="./auto_build_ios.php">返回</a>';

        exit;

    }
    if($_POST[svn] ==''){

        echo '<br/>';

        echo '<br/>';

        echo "编译失败！";

        echo '<br/>';

        echo '<br/>';

        echo "请正确填写工程SVN路径！";

        echo '<br/>';

        echo '<br/>';

        echo '<a href="./auto_build_ios.php">返回</a>';

        exit;

    }
	}
     
     include('../conn_mysql.php');
     $sql="select a.build_type from new_auto_build a,new_user_info b where a.user_id=b.id and b.user_name='$_SESSION[UserName]' and a.app_name='$_POST[project]' ";
@    $result1=mysqli_query($conn,$sql);
     $row = mysqli_fetch_array($result1);
	 
     if($row[build_type]==1){
		 $project=$_POST[project];
		 $svn=$_POST[svn];
		 
     $make_dir_command="/Users/tester/Library/tomcat/webapps/ios-build/auto_project_ipa_build $project $svn";
	 
   @  exec($make_dir_command,$output,$return);


     if($return==0){ //把刚才替换的内容写进生成的HTML文件

      echo "自动编译成功！";
	  print_r($output);

     }
     else{
      echo "自动编译失败！";
      print_r($output);
      exit;
	  echo '<a href="./auto_build_ios.php">返回</a>';
     }
 }
    if($row[build_type]==2){
	
    $make_dir_command="/Users/tester/Library/tomcat/webapps/ios-build/auto_workspace_ipa_build $_POST[project] $_POST[svn]";
 
    @ exec($make_dir_command,$output,$return);

    if($return==0){ //把刚才替换的内容写进生成的HTML文件

     echo "自动编译成功！";

    }
    else{
     echo "自动编译失败！";
     print_r($output);
     exit;
    }
 }
}
	
	
	
	
	
    //插入数据
    include('conn_mysql.php');
    $sql="select prj_name from new_auto_ipa  where prj_name='$_POST[project]'";
    $result1=mysqli_query($conn,$sql);
  @ $row = mysqli_fetch_array($result1);

    if($row[prj_name]==''){
       $sql="insert into new_auto_ipa (id,app_power,platform,prj_name,prj_svn,add_time,add_name)values('',1,'$_POST[style]','$_POST[project]','$_POST[svn]',now(),'$_SESSION[UserName]')";
       if(  $result=mysqli_query($conn,$sql)){
            //echo '<script>alert("恭喜！您的文件编译成功!")</script>';
        }
        else{
            echo "数据插入失败！";

            echo '<hr/>';

            echo '<a href="index.php">返回首页</a>';

            echo '<a href="auto_build_ios.php">返回</a>';

            exit;
        } 
    }
    else{
    	$sql="update new_auto_ipa set prj_svn='$_POST[svn]' ,add_time=now(),add_name='$_SESSION[UserName]' where prj_name='$_POST[project]' ";
        if(  $result=mysqli_query($conn,$sql)){
           
         }
         else{
             echo "数据插入失败！";

             echo '<hr/>';

             echo '<a href="index.php">返回首页</a>';

             echo '<a href="auto_build_ios.php">返回</a>';

             exit;
         } 
    }


    



  



     

    
	 
	 
	 
	 /*
     $na=explode('.',$app_name1);
     $su=array_pop($na);
     $string = implode('.',$na);
     //$yuanfile="/Applications/XAMPP/xamppfiles/htdocs/focus-app/apptemp/$string.plist";
     //$xianfile="/Applications/XAMPP/xamppfiles/htdocs/focus-app/auto-plist/$string.plist";
     //copy($yuanfile,$xianfile);
     //rename("D:/logs/write/theme/history","F:/logs/write/theme/history");
    $ar=explode('.',$app_name1);
    $lcy=count($ar);	
	 */
?>

</div>

<div id="sheet">

    <hr/>

    <a href="index.php">返回首页</a>

    <a href="auto_build_ios.php">继续编译</a>

</div>

</div>

</body>

</html>
