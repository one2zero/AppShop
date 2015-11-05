<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lichuangye
 * Date: 13-10-11
 * Time: 上午8:34
 * To change this template use File | Settings | File Templates.
 */
 $preg = "/\A((([0-9]?[0-9])|(1[0-9]{2})|(2[0-4][0-9])|(25[0-5]))\.){3}(([0-9]?[0-9])|(1[0-9]{2})|(2[0-4][0-9])|(25[0-5]))\Z/";
//获取操作系统为win2000/xp、win7的本机IP真实地址
    exec("ipconfig", $out, $stats);
    if (!empty($out)) {
        foreach ($out AS $row) {
            if (strstr($row, "IP") && strstr($row, ":") && !strstr($row, "IPv6")) {
                $tmpIp = explode(":", $row);
                if (preg_match($preg, trim($tmpIp[1]))) {
                    $ip=trim($tmpIp[1]);
                }
            }
        }
    }
?>
