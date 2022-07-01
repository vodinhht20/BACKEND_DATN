<?php
namespace App\Libs;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class Slack
{
    public static function send($text, $url)
    {
        if (env('APP_ENV') == 'local') return;

        $payload = [
            'text'       => $text,
            'username'   => 'Camel',
            'icon_emoji' => ':camel:',
        ];

        try {
            $client = new Client();

            $response = $client->post($url, [
                'json' => $payload,
            ]);

            $response = $response->getBody()->getContents();

            if ($response != 'ok') {
                Log::error('push message to slack failed.');
            }
        } catch (\Exception $e) {
            Log::error('push message to slack failed.');
        }
    }

    public static function error($text)
    {
        $slackUrl = env('SLACK_WORK_CAMEL');
        static::send($text, $slackUrl);
    }
}
