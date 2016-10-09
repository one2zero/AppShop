<?php
error_reporting(0);
header('Content-type: text/html; charset=utf-8');
include('conn_mysql.php');
include('DownPlistCreator.php');

?>


<?php
    var_dump($_FILES);

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


    if (!is_uploaded_file($_FILES["upfile"]['tmp_name'])){
        echo "无效的文件！";
        exit;
    }

    $app_name1 = $_FILES["upfile"]['name'];
    include('conn_mysql.php');
    $sql="select distinct app_name  from new_app_info  where app_name= '$app_name1' and app_status=1 and app_power in (1,2,3)  ";
    $result1=mysqli_query($conn,$sql);
    @ $row = mysqli_fetch_array($result1);
    if($app_name1==$row[app_name]){
       echo "文件已存在！";
        exit;
    }
    $ar=explode('.',$app_name1);


    $lcy=count($ar);
    if($_POST[style] ==''){
        echo "上传失败！请选择安装平台！";
        exit;
    }
    if($ar[$lcy-1] =="ipa" || $ar[$lcy-1]=="apk"){
    }
    else{
        echo "上传失败！文件类型不正确，请选择正确的文件类型！";
        exit;
    }


    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
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
                echo "移动文件出错!";
                exit;
            }

            $infoPlistPath = getInfoPlist($destination);
            $idAndversion =  CFPropertyList\DownPlistCreator::readInfoPlist($infoPlistPath);
            $fileNameMD5 = md5(basename($destination,".ipa"));
            $downPlistPath = '../new_app/pub_plist/'.$fileNameMD5.'.plist';
            $downFileIcon = 'https://192.168.1.175/new_app/project_icon/'.$project_name.'.png';
            CFPropertyList\DownPlistCreator::createDownPlist('https://192.168.1.175/new_app/pub_ipa/'.basename($destination),$downFileIcon,
                $downFileIcon,$downPlistPath,$idAndversion[0],$idAndversion[1]);
            $unloadPackgePath = $destination_folder.basename($destination,".ipa");
            deleteAll($unloadPackgePath);

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
                echo "移动文件出错!";
                exit;
            }

            
        }
    }

    include('conn_mysql.php');
    $app_name = $_FILES["upfile"]['name'];
    $sql="insert into new_app_info (project,platform,version,app_name,app_status,app_power,add_time,add_name,add_ip,del_name) values('$_POST[project]','$_POST[style]','','$app_name','1','$_POST[release]',now(),'$_POST[username]','$ipd','')";
    // echo $sql;
    //     exit;
    if(  $result=mysqli_query($conn,$sql)){
        echo "恭喜！您的文件上传成功!";
    }
    else{
        echo "数据插入失败！";
        echo $sql;
        exit;
    }
}
?>