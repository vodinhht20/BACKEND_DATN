<?php
namespace App\Service\Opencage;

class OpencageData {
    private function callAPI($url, array $query = [])
    {
        try {
            $client = new \GuzzleHttp\Client(['http_errors' => false]);
            $response = $client->request('GET', $url, [
                "query" => $query
            ]);
            if ($response->getStatusCode() === 200 ) {
                return json_decode((string)$response->getBody(), true);
            }
            $message = "Không thể get data từ " . $url . " | Trạng thái " . $response->getStatusCode();
            \Log::error($message);
            return;
        } catch (\Exception $e) {
            \Log::error($e->getCode() . ' - ' . $e->getMessage() . "\r\n" . $e->getTraceAsString());
            return;
        }
    }
}
