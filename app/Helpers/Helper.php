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

/**
 * Hàm chuyển đổi từ fullname thành email theo dịnh dạng được fortmart
 *
 * @param string $text
 * @param string $prefix
 * @return string
 */
function makeEmail(string $text, string $prefix = "@gmail.com"): string
{
    $unicode = array(
        'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
        'd'=>'đ',
        'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'i'=>'í|ì|ỉ|ĩ|ị',
        'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
        'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'D'=>'Đ',
        'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
        'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    );
    foreach($unicode as $nonUnicode=>$uni){
        $text = preg_replace("/($uni)/i", $nonUnicode, $text);
    }
    $text = str_replace(' ', ' ', $text);
    $text = strtolower($text);
    $chunkText = explode(" ", $text);
    $lastText = array_pop($chunkText);
    $result = '';
    foreach ($chunkText as $item) {
        $result .= $item[0];
    }
    $gmail = strtolower($lastText . $result . $prefix);
    return $gmail;
}
