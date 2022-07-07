<?php

function getStatusName($status)
{
    $statusName = "";
    if ($status == 1) {
        $statusName = "Đang hoạt động";
    } elseif ($status == 2) {
        $statusName = "Chưa kích hoạt";
    } elseif ($status = null) {
        $statusName = "";
    } else {
        $statusName = "Bị chặn";
    }
    return $statusName;
}

function getGender($gender)
{
    $gender = "Nam";
    if ($gender == 2) {
        $gender = "Nữ";
    }
    return $gender;
}

function getDataType($dataType){
    $type = "text";
    if($dataType ==2){
        $type = "email";
    }
    return $type;
}
