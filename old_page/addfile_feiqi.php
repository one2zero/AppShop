<html>
<head>
<title>上传文件至服务器</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;"  />
<link href="css/addfile.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="bd" >
  <div id ="title">
    <h2>上传文件至服务器</h2>
  </div>
  <div id="content">
      <p id="ts"> 上传程序ipa包的 Bundle identifier 和页面输入的 Bundle identifier 要保证一致
          测试人员编译IPA包时须在原Bundle identifier后添加.test，用以保证该ID不和已经被使用的AppID相同!</p>
    <form  id="fr" action="check.php" enctype="multipart/form-data" method="post" name="upform" >
      <table >
        <tr>
          <th scope="row">
      下载权限：
      </th>
      <td><input type="radio" name="release" value="1" required aria-required="true">
        内测
        <input type="radio" name="release" value="2" required aria-required="true">
        私有
        <input type="radio" name="release" value="3" required aria-required="true">
        预览 </td>
      </tr>
      <tr>
        <th scope="row">项目名称：</th>
        <td><select name="project"  >
            <?php
                  include('conn_mysql.php');
                  $sql="select * from new_config_prj ";
                  $result1=mysqli_query($conn,$sql);
              while($row = mysqli_fetch_array($result1)){
              ?>
            <option value="<?php echo $row[prj_num] ?>"><?php echo $row[prj_name] ?></option>
            <?php
  }
?>
          </select></td>
      </tr>
      <tr>
        <th scope="row">安装平台：</th>
        <td><input type="radio" name="style" value="iphone" required aria-required="true">
          iphone
          <input type="radio" name="style" value="ipad" required aria-required="true">
          ipad
          <input type="radio" name="style" value="android" required aria-required="true">
          Android
          <input type="radio" name="style" value="android-HD" required aria-required="true">
          And-HD </td>
      </tr>
      <tr>
        <th scope="row">Bundle identifier(IOS程序必填)：</th>
        <td><input type="text" name="bid" required aria-required="true" placeholder="ex:com.focuschina.xxxx"></td>
      </tr>
      <tr>
        <th scope="row"><input id="fo" name="upfile" type="file"></th>
        <td><input id="fo1" type="submit"  name="submit"  value="&nbsp;上&nbsp;传&nbsp;文&nbsp;件&nbsp;"></td>
      </tr>
      <tr>
        <th scope="row">允许上传的文件后缀为：</th>
        <td>ipa、apk(注意程序后缀为小写)</td>
      </tr>
      </table>
    </form>
  </div>
  <div id="sheet">
    <hr>
    <a href="index.php">返回首页</a> </div>
</div>
</body>
</html>
