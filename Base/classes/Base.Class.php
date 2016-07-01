<?php 

// error_reporting(0);
// define(‘Root_Path’,dirname(__FILE__));
header('Content-type: text/html; charset=utf-8');
// include(Root_Path."/conn_mysql.php")
include_once ('../../conn_mysql.php');
// include_once ($_SERVER['DOCUMENT_ROOT'].'/AppShop/conn_mysql.php'); 
// $C = isset($_GET['C'])?$_GET['C']:NULL;  
// $M = isset($_GET['M'])?$_GET['M']:NULL;

// if($C != NULL && $M != NULL && class_exists($C) && method_exists($C, $M)) {  
//     $cObj = new $C();  
//     $cObj->$M();  
// }else{  
//     echo '找不到控制器或方法';  
//     exit;  
// }  
  
// 控制器1  
class Base  
{  


    public function test()  
    {     
                                // include_once('../../conn_mysql.php');
        global $conn;
                                if (!$conn) {
                                    echo "no database";
                                }                       
                                
        echo 'Base, test';  
    }     
    public function localxx()  
    {     
        echo 'Base , localxx';  
    }     
}  


?>