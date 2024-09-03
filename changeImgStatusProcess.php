<?php

require "connection.php";

$id= $_GET["id"];

$rs = Database::search("SELECT * FROM `posts` WHERE `id`='".$id."'");
$num = $rs->num_rows;

if($num == 1){

    $data = $rs->fetch_assoc();
    $status = $data["approvel"];

    if($status == 1){

        Database::iud("UPDATE `posts` SET `approvel`='2' WHERE `id`='".$id."'");
        echo ("deactivated");

    }else if($status == 2){

        Database::iud("UPDATE `posts` SET `approvel`='1' WHERE `id`='".$id."'");
        echo ("activated");

    }

}else{
    echo ("Something Went Wrong. Please try again later.");
}

?>