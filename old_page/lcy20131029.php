<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lichuangye
 * Date: 13-10-29
 * Time: 下午7:49
 * To change this template use File | Settings | File Templates.
 *连接数据组
 *
 */

$a='app.ipa';
$suz=explode('.',$a);
//print_r($suz);
//剔除数组最后一个值
$su=array_pop($suz);
//print_r($suz) ;
//连接数组
$string = implode('.',$suz);
echo $string;

  //  if( $ar =="ipa") {
 if($ar[$lcy-1]=="ipa"){
     /*
    * !strncasecmp($string, 'Trudeau', 4)){
      print "true";
    * 生成安装应用所需文件；
    * */
     $fp=fopen("model.plist","r"); //只读打开模板
     $str=fread($fp,filesize("model.plist"));//读取模板中内容
     // $str=str_replace("{ip_add}",$ip,$str);
     $str=str_replace("{app_name}",$app_name,$str);
     $str=str_replace("{version}",$_POST[version],$str);//替换内容
     $str=str_replace("{focusbid}",trim($_POST[bid]),$str);//替换内容
     $str=str_replace("{appname}",$app_name,$str);

     fclose($fp);
     $add="./plist/";
     $na=explode('.',$app_name);
     $su=array_pop($na);
     $string = implode('.',$na);
     //以第一个点号前面的的字符串最为plist文件的名字
     $handle=fopen($add.$string.'.plist',"w"); //写入方式打开新闻路径
     if(fwrite($handle,$str)){ //把刚才替换的内容写进生成的HTML文件
         fclose($handle);
     }
     else{
         echo "Plist文件生成失败！";
         exit;
     }

 }

?>

