<?php

require "connection.php";

$e= $_GET["e"];

$rs = Database::search("SELECT * FROM `user` WHERE `email`='".$e."'");
$num = $rs->num_rows;

if($num == 1){

    $data = $rs->fetch_assoc();
    $status = $data["status"];

    if($status == 1){

        Database::iud("UPDATE `user` SET `status`='2' WHERE `email`='".$e."'");
        echo ("deactivated");

    }else if($status == 2){

        Database::iud("UPDATE `user` SET `status`='1' WHERE `email`='".$e."'");
        echo ("activated");

    }

}else{
    echo ("Something Went Wrong. Please try again later.");
}

?>