<?php

function getStatusName($status){
    $statusName = "";
    if($status == 1){
        $statusName = "Active";
    }elseif($status == 2){
        $statusName = "Deactive";
    }elseif($status = null){
        $statusName = "";
    }else{
        $statusName = "Banned";
    }
    return $statusName;
}

function getGender($gender){
    $gender = "";
    if($gender == 1){
        $gender = "Nam";
    }else{
        $gender = "Nữ";
    }
    return $gender;
}