<?php 
namespace CFPropertyList; 
// 调试 
error_reporting( E_ALL ); 
// error_reporting(0);
// ini_set( ‘display_errors’, ‘on’ ); 
/** 
* Require CFPropertyList 
*/ 

// require_once(__DIR__.’/../classes/CFPropertyList/CFPropertyList.php’); 
require_once (__DIR__ . '/CFPropertyList/classes/CFPropertyList/CFPropertyList.php');


/**
* 
*/
class DownPlistCreator 
{
  

/**
* 根据传入的ipa文件生成供其下载使用的plist文件
*/
  static public function createDownPlist( $ipaFilePath, $displayImagePath, $fullImagePath, $downPlistPath,
    $bundleID,$bundleVersion) {
    $downPlist = new CFPropertyList();
    //添加root
    $downPlist->add( $rootDict = new CFDictionary() );

    $rootDict-> add( 'items', $itemsArray = new CFArray() );
    $itemsArray->add($item0 = new CFDictionary());

    $item0->add('assets', $assetsArray = new CFArray() );
    $item0->add('metadata', $metadataDict = new CFDictionary() );

    $assetsArray->add($asset0Dict = new CFDictionary());
    $asset0Dict->add('kind',new CFString('software-package'));
    // $asset0Dict->add('url',new CFString('https://192.168.0.110/new_app/pub_ipa/pipapai.ipa'));
    $asset0Dict->add('url',new CFString($ipaFilePath));

    $assetsArray->add($asset1Dict = new CFDictionary());
    $asset1Dict->add('kind',new CFString('display-image'));
    // $asset1Dict->add('url',new CFString('https://192.168.0.110/AppShop/app/gc.png'));
    $asset1Dict->add('url',new CFString($displayImagePath));

    $assetsArray->add($asset2Dict = new CFDictionary());
    $asset2Dict->add('kind',new CFString('full-size-image'));
    // $asset2Dict->add('url',new CFString('https://192.168.0.110/AppShop/app/gc.png'));
    $asset2Dict->add('url',new CFString($fullImagePath));


    // $metadataDict->add('bundle-identifier',new CFString('com.PIPAPAI.JobSeeker'));
    // $metadataDict->add('bundle-version',new CFString('1.6.1'));
    $metadataDict->add('bundle-identifier',new CFString($bundleID));
    $metadataDict->add('bundle-version',new CFString($bundleVersion));
    $metadataDict->add('kind',new CFString('software'));
    $metadataDict->add('title',new CFString('pipapai'));

    // $downPlist->saveBinary( "../new_app/pub_plist/down1.plist" );
    $downPlist->saveBinary( $downPlistPath);
  }


  static public function readInfoPlist($infoPlistPath){
    echo $infoPlistPath; 
    if (is_readable($infoPlistPath)) {
    echo 'The file is readable';
} else {
    echo 'The file is not readable';
}
    // $infoPlist = new CFPropertyList($infoPlistPath,CFPropertyList::FORMAT_XML);
    $infoPlist = new CFPropertyList($infoPlistPath);
    
    foreach( $infoPlist->getValue(true) as $key => $value )
    {
      if( $key == "CFBundleIdentifier" )
      {
        $bundleID = $value->getValue();
      }

      if( $key == "CFBundleShortVersionString" )
      {
        $bundleVersion = $value->getValue();
      }
  
  // if( $value instanceof \Iterator )
  // {
  //   // The value is a CFDictionary or CFArray, you may continue down the tree
  //   echo "xxxxxx".$key;
  //   echo '</br>';
  //   // echo $value->toArray();
  // }else{
  //   echo "yyyyyy".$key.'::'.$value->getValue();
  //   echo '</br>';
  // }
    }
    

    return array($bundleID,$bundleVersion);
    // echo $bundleID->toArray() ;
    // print_r($infoPlist->toArray()); 
    // echo $infoPlist->toArray(); 
  }




  // static public function getInfoPlist($ipaFilePath){

  //       $dirPath =  dirname($ipaFilePath);
  //       $fileExtension =  pathinfo($ipaFilePath, PATHINFO_EXTENSION); 
  //       $dirPath = $dirPath.'/'.basename($ipaFilePath,'.'.$fileExtension);
  //       echo $dirPath;

  //       if (!file_exists($dirPath)) {
  //           mkdir($dirPath);
  //       }
        
  //       $zip=new ZipArchive();//新建一个ZipArchive的对象
  //         if($zip->open($ipaFilePath)===TRUE){

  //         $zip->extractTo($dirPath);//假设解压缩到在当前路径下images文件夹内
  //         $zip->close();//关闭处理的zip文件
  //       }

  //       $payloadPath = $dirPath."/Payload/";
  //       echo $payloadPath;
  //       // $payloadDir = opendir($payloadPath);
  //       // $copyPath = readdir($payloadDir);
  //       // echo $copyPath;

  //       $infoPlistPath;

  //       if(is_dir($payloadPath))
  //         {
  //             if ($dh = opendir($payloadPath))
  //             {
  //                 while (($file = readdir($dh)) !== false)
  //                 {
  //                     if((is_dir($payloadPath."/".$file)) && $file!="." && $file!="..")
  //                     {
  //                         echo "<b><font color='red'>文件名：</font></b>",$file,"<br><hr>";
  //                         $infoPlistPath = $payloadPath."/".$file."/Info.plist";
  //                     }
  //                     else
  //                     {
  //                         if($file!="." && $file!="..")
  //                         {
  //                             echo $file."<br>";
  //                         }
  //                     }
  //                 }
  //                 closedir($dh);
  //             }
  //         }
  //         echo $infoPlistPath;

  //         DownPlistCreator::readInfoPlist($infoPlistPath);

  // }
}


// function tree($directory)
// {

//     $mydir = dir($directory);
//     echo "<ul>\n";
//     while($file = $mydir->read())
//     {
//         if((is_dir("$directory/$file")) AND ($file!=".") AND ($file!=".."))
//         {
//             echo "<li><font color=\"#ff00cc\"><b>$file</b></font></li>\n";

//             tree("$directory/$file");
//         }
//         else
//           echo "<li>$directory/$file</li>\n";
//     }
//     echo "</ul>\n";
//     $mydir->close();

// }

// function listDir($dir)
// {
//     if(is_dir($dir))
//     {
//         if ($dh = opendir($dir))
//         {
//             while (($file = readdir($dh)) !== false)
//             {
//                 if((is_dir($dir."/".$file)) && $file!="." && $file!="..")
//                 {
//                     echo "<b><font color='red'>文件名：</font></b>",$file,"<br><hr>";
//                     listDir($dir."/".$file."/");
//                 }
//                 else
//                 {
//                     if($file!="." && $file!="..")
//                     {
//                         echo $file."<br>";
//                     }
//                 }
//             }
//             closedir($dh);
//         }
//     }
// }



?>