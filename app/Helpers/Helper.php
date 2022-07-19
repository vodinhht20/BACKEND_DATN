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
    if($dataType == 2){
        $type = "email";
    }
    return $type;
}

/**
 * Hàm format chuỗi nếu chuỗi dài hơn $length thì sẽ hiển thị (...)
 *
 * @param string $string
 * @param integer $length
 * @return string
 */
function formartString(string $string, int $length = 100): string
{
    return strlen($string) > $length ? substr($string, 0, $length) . "..." : $string;
}
