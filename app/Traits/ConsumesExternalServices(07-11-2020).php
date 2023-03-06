<?php
namespace App\Traits;
use GuzzleHttp\Client;

trait ConsumesExternalServices {
    /**
     * Send a request to any service
     * @return string
     */
    public function makeRequest($method, $requestUrl, $queryParams = [], $formParams = [], $headers = [], $hasFile = false) {
        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);

        $bodyType = 'form_params';

        if ($hasFile) {
            $bodyType = 'multipart';
            $multipart = [];

            foreach ($formParams as $name => $contents) {
                $multipart[] = [
                    'name' => $name,
                    'contents' => $contents
                ];
            }
        }

        $response = $client->request($method, $requestUrl, [
            'query' => $queryParams,
            $bodyType => $hasFile ? $multipart : $formParams,
            'headers' => $headers,
        ]);

        $response = $response->getBody()->getContents();

        return $response;
    }

    public function GetApi($url) {
        $client = new Client();
        $request = $client->get(env('API_URL').$url);
        $response = $request->getBody();
        return $response;
    }


    public function PostApi($url,$body) {
        try {
            $client = new Client();
            $response = $client->request("POST", env('API_URL').$url, ['form_params'=>$body]);
            $response = json_decode($response->getBody()->getContents());
            //$returnRes = json_decode(json_encode(json_decode($response->getBody()->getContents())),true);
            return [
                "status" => 200,
                "message" => $response->message,
                "data" => (array)$response->data,
            ];
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            return [
                "status" => 422,
                "message" => 'Errors.',
                "errors" => $e->getResponse()->getBody()->getContents(),
            ];
        }
    }

    public function send_sms($mobile_number,$message) {
        $ch = curl_init("http://smshorizon.co.in/api/sendsms.php?user=".env('USER_NAME_API')."&apikey=".env('API_KEY')."&mobile=".$mobile_number."&message=".$message."&senderid=".env('SENDER_ID')."&type=".env('TYPE_KEY').""); 
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
        $output = curl_exec($ch);
        
        curl_close($ch);
        return $output;
    }
}