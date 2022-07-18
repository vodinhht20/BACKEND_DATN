<?php
namespace App\Libs;

use Kutia\Larafirebase\Facades\Larafirebase;

class FirebasePushDataReatime
{
    /**
     * Hàm gửi thông báo cùng với banner tới client
     *
     * @param string $title
     * @param string $banner
     * @param array $tokens
     * @return void
     */
    public static function sendWithBanner(string $title, string $banner, array $tokens): void
    {
        Larafirebase::withTitle($title)
            ->withBody('Test body')
            ->withImage($banner)
            ->withIcon('https://seeklogo.com/images/F/firebase-logo-402F407EE0-seeklogo.com.png')
            ->withClickAction('admin/')
            ->withPriority('high')
            ->withAdditionalData([
                'routing_key' => 'some_screen',
                'routing_value' => 42
            ])
            ->sendNotification($tokens);
    }

    /**
     * Hàm gửi data cho client
     *
     * @param array $data
     * @param array $tokens
     * @param string $key
     * @return void
     */
    public static function sendData(array $data, array $tokens, string $key = "dataRaw"): void
    {
        Larafirebase::fromArray([
            'title' => $key,
            'body' => [...$data]
        ])->sendMessage($tokens);
    }

    /**
     * Hàm gửi thông tin nhắn cho client
     *
     * @param string $title
     * @param string $content
     * @param array $tokens
     * @return void
     */
    public static function sendMessage(string $title, string $content, array $tokens): void
    {
        Larafirebase::fromArray([
            'title' => $title,
            'body' => $content
        ])->sendMessage($tokens);
    }
}
