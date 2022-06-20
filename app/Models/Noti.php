<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noti extends Model
{
    use HasFactory;
    public static function telegram($message){
        $date = getdate();
        $website = "https://api.telegram.org/bot" . env('TELEGRAM_BOT_TOKEN');
        $chatId = '@mecoinnoti';
        $params = [
            'chat_id' => $chatId,
            'text' => 'Tài khoản "' . $message['email'] .'" vừa login  
Thời gian: ' . $date['year'].'/'.$date['mon'].'/'.$date['mday'].' '.$date['hours'].':'.$date['minutes'].':'.$date['seconds']. '
Thiết bị: '.$_SERVER['HTTP_USER_AGENT'].'
IP: '.$_SERVER['REMOTE_ADDR'],
        ];
        $ch = curl_init($website . '/sendMessage');
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close($ch);
    }
}
