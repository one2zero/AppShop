<?php 


include_once ('../../conn_mysql.php');
                                $sql="select * from new_config_prj ";
                                mysql_query("SET NAMES UTF8"); 
                                if (!$conn) {
                                    echo "no database";
                                }
                                $result1=mysqli_query($conn,$sql);
                                while($row = mysqli_fetch_array($result1)){
                                    
                                    echo $row[prj_name];
                                    
                                }


?>