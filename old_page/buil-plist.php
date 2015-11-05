<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lichuangye
 * Date: 13-10-17
 * Time: 下午7:32
 * To change this template use File | Settings | File Templates.
 */
include('local_ip.php');

    $path = './auto-ipa-build';
    $h = scandir($path);

foreach($h as $v){
    if($v != '.' and $v!= '..'){
        $n1=explode('.',$v);
        $me=$n1[0];

         if(is_file($path.'/'.$v)){
             $da=date('r', filemtime($path.'/'.$v));

             $sql="insert into add_app (id,project,platform,version,add_time,app_name) values('','$me','auto_ipa-build','1.0.1',now(),'$name')";
             if(  $result=mysqli_query($conn,$sql)){

             }
             else{
                 echo "数据插入失败！";
                 echo '<h4>您还可以：</h4>';
                 echo '<hr/>';
                 echo '<a href="index.php">返回首页</a>';
                 exit;
             }


             //$a=$n1[1];
             /*
             if($a == "ipa"){
                //生成安装应用所需文件；
                 $fp=fopen("auto-model.plist","r"); //只读打开模板
                 $str=fread($fp,filesize("auto-model.plist"));//读取模板中内容
                 $str=str_replace("{ip_add}",$ip,$str);
                 $str=str_replace("{app_name}",$v,$str);
                 $str=str_replace("{version}","1.0.0",$str);//替换内容
                 $str=str_replace("{appname}",$me,$str);

                 fclose($fp);
                 $add="./auto-plist/";
                 // $na=explode('.',$app_name);
                 $handle=fopen($add.$me.'.plist',"w"); //写入方式打开新闻路径
                 if(fwrite($handle,$str)){ //把刚才替换的内容写进生成的HTML文件
                     fclose($handle);
                 }
                 else{
                     echo "Plist文件生成失败！";
                     exit;
                 }


             }
             */



           }

   }
}

?>
