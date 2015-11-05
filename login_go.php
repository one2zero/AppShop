<?php
//在显示登录界面之前，首先判断是否保存了用户登录信息，如果有，则自动登录
error_reporting(0);
header('Content-type: text/html; charset=utf-8');
include('conn_mysql.php');
session_start();
$query="select * from new_user_info where user_name='{$_SESSION['UserName']}' and password='{$_SESSION['Password']}'";
$result1=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result1);
if ($row)
{
    if($row[power]==1){
        header("url=http://mobapp.vemic.com/private.php");
    }
    if($row[power]==2){
        header("url=http://mobapp.vemic.com/member/membercenter.php");
    }
    if($row[power]==3){
        header("url=http://mobapp.vemic.com/member/membercenter.php");
    }
}
?>

<?php
header('Content-type: text/html; charset=utf-8');
include('conn_mysql.php');
session_start();// 启动会话
// 获取用户的登录信息。用户名，密码，是否保存信息
$UserName1=$_POST["UserName"];
$Password1=$_POST["Password"];
$Remember=$_POST["KeepInfo"];
if ($Remember=="KeepInfo")
{
    $Remember="1";
}
else
{
    $Remember="0";
}
// 如果用户点击了保存登录信息，将 Remember 置为 1 ，否则置为 0
    if(trim($UserName1)==''){
        echo '<br/>';
        echo '<br/>';
        echo "登录失败！";
        echo '<br/>';
        echo '<br/>';
        echo "用户名不能为空！";
        echo '<br/>';
        echo '<br/>';
        echo '<a href="login.php">返回</a>';
        exit;
    }
    if(trim($Password1)==''){
        echo '<br/>';
        echo '<br/>';
        echo "登录失败！";
        echo '<br/>';
        echo '<br/>';
        echo "密码不能为空！";
        echo '<br/>';
        echo '<br/>';
        echo '<a href="login.php">返回</a>';
        exit;

    }
// 查询用户名是否存在
     include('conn_mysql.php');
    $query="select * from new_user_info where user_name='$UserName1'";
 @   $result1=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result1);
if ($row)
{       // 判断密码是否正确
        if ($row["password"]==$Password1)
        {
        // 如果密码正确，修改最近登录时间，将登录失败信息清除
            $datetime=date("d-m-Y G:i");
            $query="update new_user_info set LastLogin='$datetime' where user_name='$UserName1'";
            $result1=mysqli_query($conn,$query);
            $query="update new_user_info set NumLoginFail='0' where user_name='$UserName1'";
            $result1=mysqli_query($conn,$query);
            unset($_SESSION["Password"]);
            unset($_SESSION["UserName"]);
            $_SESSION["Password"]=$Password1;
            $_SESSION["UserName"]=$UserName1;
            if ($Remember=="1")
            {
                setcookie("RememberCookieUserName",$UserName1,(time()+43200));
                setcookie("RememberCookiePassword",md5($Password1),(time()+43200));
            }
            // 登录成功，页面转到管理页面
            header("refresh:1;url=http://mobapp.vemic.com/succes.php");

            }
        else
        {
             $query="update new_user_info set LastLoginFail=now() where user_name='$UserName1'";
             $result1=mysqli_query($conn,$query);
             header("refresh:3;url=http://mobapp.vemic.com/login.php");
             echo " 密码错误，请重新输入 <br>3 秒后自动返回 ";

        }
    }
    else
    {
            header("refresh:3;url=http://mobapp.vemic.com/login.php");
            echo " 用户不存在，如需帮助联系：6719. ";
            echo "<br>3 秒后自动返回 ";
            exit;
        }


 ?>