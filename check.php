<?php
//在显示登录界面之前，首先判断是否保存了用户登录信息，如果有，则自动登录
error_reporting(0);
header('Content-type: text/html; charset=utf-8');
include('conn_mysql.php');
include('DownPlistCreator.php');
session_start();

?>
<html>
<head>
    <meta charset="utf-8">
    <title>AppShop--Pipapai.inc</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="/AppShop/Flat-UI-master/dist/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="/AppShop/Flat-UI-master/dist/css/flat-ui.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="../../dist/js/vendor/html5shiv.js"></script>
      <script src="../../dist/js/vendor/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
    .text {
        height: 65px;
        overflow: hidden;
        word-wrap: break-word;
    }
    </style>
</head>
<body>
<div  id="container">



    <nav role="navigation" class="navbar navbar-inverse navbar-embossed navbar-lg">
        <div class="navbar-header">
          <button data-target="#bs-example-navbar-collapse-17" data-toggle="collapse" class="navbar-toggle" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="../index.php" class="navbar-brand">AppShop</a>
        </div>
         <?php
        if($_SESSION[UserName]!=''){
        ?> 
              

            <div id="bs-example-navbar-collapse-17" class="collapse navbar-collapse">
              <p class="navbar-text navbar-right"><a class="navbar-link" href="logout.php">退出</a></p>
              <p class="navbar-text navbar-right"><a class="navbar-link" href="./member/membercenter.php"><?php echo $_SESSION[UserName]; ?></a></p>
            </div>
        <?php
        }else{
        ?>
            <div id="bs-example-navbar-collapse-17" class="collapse navbar-collapse">
              <p class="navbar-text navbar-right"><a class="navbar-link" href="login.php">登录</a></p>
            </div>
        <?php
        }
        
        ?>
      </nav>
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



function getInfoPlist($ipaFilePath){

        $dirPath =  dirname($ipaFilePath);
        $fileExtension =  pathinfo($ipaFilePath, PATHINFO_EXTENSION); 
        $dirPath = $dirPath.'/'.basename($ipaFilePath,'.'.$fileExtension);
        // echo $dirPath;

        if (!file_exists($dirPath)) {
            mkdir($dirPath);
        }
        
        $zip=new ZipArchive();//新建一个ZipArchive的对象
          if($zip->open($ipaFilePath)===TRUE){

          $zip->extractTo($dirPath);//假设解压缩到在当前路径下images文件夹内
          $zip->close();//关闭处理的zip文件
        }

        $payloadPath = $dirPath."/Payload";
        // echo $payloadPath;
        // $payloadDir = opendir($payloadPath);
        // $copyPath = readdir($payloadDir);
        // echo $copyPath;

        $infoPlistPath;

        if(is_dir($payloadPath))
          {
              if ($dh = opendir($payloadPath))
              {
                  while (($file = readdir($dh)) !== false)
                  {
                      if((is_dir($payloadPath."/".$file)) && $file!="." && $file!="..")
                      {
                          // echo "<b><font color='red'>文件名：</font></b>",$file,"<br><hr>";
                          $infoPlistPath = $payloadPath."/".$file."/Info.plist";
                      }
                      else
                      {
                          if($file!="." && $file!="..")
                          {
                              // echo $file."<br>";
                          }
                      }
                  }
                  closedir($dh);
              }
          }
          // echo $infoPlistPath;
          return $infoPlistPath;
          // readInfoPlist($infoPlistPath);

  }

function deleteAll($path) {
    $op = dir($path);
    while(false != ($item = $op->read())) {
        if($item == '.' || $item == '..') {
            continue;
        }
        if(is_dir($op->path.'/'.$item)) {
            deleteAll($op->path.'/'.$item);
            rmdir($op->path.'/'.$item);
        } else {
            unlink($op->path.'/'.$item);
        }
    
    }
    rmdir($path);   
}


$ipd=getIP();

if($_POST['submit']){
	
    if (!is_uploaded_file($_FILES["upfile"]['tmp_name']))
    {
        ?>
            <h4>上传失败！请选择要上传的文件！</h4>
            <h4><a href="./member/myapp.php">返回</a></h4>
        <?php
        exit;
    }
	
	
    $app_name1 = $_FILES["upfile"]['name'];
    include('conn_mysql.php');
    $sql="select distinct app_name  from new_app_info  where app_name= '$app_name1' and app_status=1 and app_power in (1,2,3)  ";
    $result1=mysqli_query($conn,$sql);
    @ $row = mysqli_fetch_array($result1);
    if($app_name1==$row[app_name]){
        ?>
            <h4>上传失败！<?php echo $app_name1 ?>该APP已经存在，请先删除后，再试一次</h4>
            <h4><a href="./member/myapp.php">返回</a></h4>
        <?php
        exit;
    }
    $ar=explode('.',$app_name1);

    $lcy=count($ar);
    if($_POST[style] ==''){
        ?>
            <h4>上传失败！请选择安装平台！</h4>
            <h4><a href="./member/myapp.php">返回</a></h4>
        <?php
        exit;
    }
    if($ar[$lcy-1] =="ipa" || $ar[$lcy-1]=="apk"){
    }
    else{
        ?>
            <h4>上传失败！文件类型不正确，请选择正确的文件类型！</h4>
            <h4><a href="./member/myapp.php">返回</a></h4>
        <?php
        exit;
    }


}
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    
    $ServerUrl=$_SERVER['DOCUMENT_ROOT'];

    if($_POST['release']=="1"){
        if($ar[$lcy-1] =="ipa")
        {
            $project_id =  $_POST['project'];
            $sql="select * from new_config_prj where prj_num = $project_id";
            $result1=mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($result1)){
                $project_name =$row[prj_name];
            }
            

            //$destination_folder="./new_app/pub_ipa/"; //上传文件路径
            $destination_folder="/new_app/pub_ipa/"; //上传文件路径
            $file = $_FILES["upfile"];
            $filename=$file["tmp_name"];
            $pinfo=pathinfo($file["name"]);
            $ftype=$pinfo['basename'];
            $destination_folder = $ServerUrl.$destination_folder;
            
            if(!file_exists($destination_folder))
            {
                mkdir($destination_folder);
            }
            
            $destination = $destination_folder.$ftype;
            if(!move_uploaded_file ($filename, $destination))
            {
                echo "移动文件出错";
                exit;
				echo '<a href="./member/myapp.php">返回</a>';
            }

            $infoPlistPath = getInfoPlist($destination);
            $idAndversion =  CFPropertyList\DownPlistCreator::readInfoPlist($infoPlistPath);
            $fileNameMD5 = md5(basename($destination,".ipa"));
            $downPlistPath = '../new_app/pub_plist/'.$fileNameMD5.'.plist';
            $downFileIcon = 'https://192.168.0.110/new_app/project_icon/'.$project_name.'.png';
            CFPropertyList\DownPlistCreator::createDownPlist('https://192.168.0.110/new_app/pub_ipa/'.basename($destination),$downFileIcon,
                $downFileIcon,$downPlistPath,$idAndversion[0],$idAndversion[1]);
            $unloadPackgePath = $destination_folder.basename($destination,".ipa");
            deleteAll($unloadPackgePath);


    //         $na=explode('.',$app_name1);
    //         $su=array_pop($na);
    //         $string = implode('.',$na);
		  //  $make_dir_command=$destination_folder."apptemp/auto_pub_bid '{$_SESSION['UserName']}' $app_name1 $string  ";
    //        // echo $make_dir_command;
    //        // exit;
    //       exec($make_dir_command,$output,$return);
    //        if($return==0){
				
				// echo "Plist文件生成成功！";

    //        }
    //        else{
    //            echo "Plist文件生成失败！";
    //            echo "xxxxxx";
    //            print_r($output);
    //            echo "xxxxxx";
    //            print_r($return);
    //            echo "xxxxxx";
    //            print_r($make_dir_command);
    //            exit;
				// echo '<a href="./member/myapp.php">返回</a>';
    //        }

        }
        else{
            $destination_folder="/new_app/pub_apk/"; //上传android文件路径
            $file = $_FILES["upfile"];
            $filename=$file["tmp_name"];
            $pinfo=pathinfo($file["name"]);
            $ftype=$pinfo['basename'];
            
            $destination_folder = $ServerUrl.$destination_folder;
            
            if(!file_exists($destination_folder))
            {
                mkdir($destination_folder);
            }
            $destination = $destination_folder.$ftype;
            if(!move_uploaded_file ($filename, $destination))
            {
                echo "移动文件出错";
                exit;
				echo '<a href="./member/myapp.php">返回</a>';
            }


        }
    }
    if($_POST['release']=="2"){
        if($ar[$lcy-1] =="ipa")
        {
            $project_id =  $_POST['project'];
            $sql="select * from new_config_prj where prj_num = $project_id";
            $result1=mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($result1)){
                $project_name =$row[prj_name];
            }
            

            //$destination_folder="./new_app/pub_ipa/"; //上传文件路径
            $destination_folder="/new_app/pri_ipa/"; //上传文件路径
            $file = $_FILES["upfile"];
            $filename=$file["tmp_name"];
            $pinfo=pathinfo($file["name"]);
            $ftype=$pinfo['basename'];
            $destination_folder = $ServerUrl.$destination_folder;
            if(!file_exists($destination_folder))
            {
                mkdir($destination_folder);
            }
            
            $destination = $destination_folder.$ftype;
            if(!move_uploaded_file ($filename, $destination))
            {
                echo "移动文件出错";
                exit;
			    echo '<a href="./member/myapp.php">返回</a>';
            }
            $infoPlistPath = getInfoPlist($destination);
            $idAndversion =  CFPropertyList\DownPlistCreator::readInfoPlist($infoPlistPath);
            $fileNameMD5 = md5(basename($destination,".ipa"));
            $downPlistPath = '../new_app/pri_plist/'.$fileNameMD5.'.plist';
            $downFileIcon = 'https://192.168.0.110/new_app/project_icon/'.$project_name.'.png';
            CFPropertyList\DownPlistCreator::createDownPlist('https://192.168.0.110/new_app/pri_ipa/'.basename($destination),$downFileIcon,
                $downFileIcon,$downPlistPath,$idAndversion[0],$idAndversion[1]);
            $unloadPackgePath = $destination_folder.basename($destination,".ipa");
            deleteAll($unloadPackgePath);

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
			    echo '<a href="./member/myapp.php">返回</a>';
            }
        }
    }
  
    //插入数据
    include('conn_mysql.php');
    $app_name = $_FILES["upfile"]['name'];
    $sql="insert into new_app_info (project,platform,version,app_name,app_status,app_power,add_time,add_name,add_ip,del_name) values('$_POST[project]','$_POST[style]','','$app_name','1','$_POST[release]',now(),'$_SESSION[UserName]','$ipd','')";
    if(  $result=mysqli_query($conn,$sql)){
        echo '<script>alert("恭喜！您的文件上传成功!")</script>';
    }
    else{
        echo "数据插入失败！";
        echo '<hr/>';
        echo $sql;
        echo '<a href="./member/myapp.php">返回</a>';
        exit;
    }

}
	
?>
</div>
</body>
</html>