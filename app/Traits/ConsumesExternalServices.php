<?php
namespace App\Traits;
use GuzzleHttp\Client;
use App\dgmodel\OrderTrackingLog;

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

    /* public function GetApi($url) {
        $client = new Client();
        $request = $client->get(env('API_URL').$url);
        $response = $request->getBody();
        return $response;
    } */
    public function GetApi($url) {
        $response = json_decode(file_get_contents($url), true);
        return $response;
    }

    public function PostApi($url,$body) {
        try {
            $client = new Client();
            // $response = $client->request("POST", env('API_URL').$url, ['form_params'=>$body]);
            // $response = $client->request("POST", $url, $body);
            $response = $client->post( $url,['form_params' => $body]);
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

    public function orderTrackingLog($body)
    {
        $order_tracking_log = new OrderTrackingLog;

        $order_tracking_log->user_id = isset($body['user_id']) ? $body['user_id'] :null;
        $order_tracking_log->order_id = isset($body['order_id']) ? $body['order_id'] :null;
        $order_tracking_log->order_status = isset($body['order_status']) ? $body['order_status'] :null;
        $order_tracking_log->driver_id = isset($body['driver_id']) ? $body['driver_id'] :null;
        $order_tracking_log->created_at = isset($body['created_at']) ? $body['created_at'] : date("Y-m-d H:i:s");
        $order_tracking_log->created_on = isset($body['created_on']) ? $body['created_on'] : null;

        $order_tracking_log->save();
        return $order_tracking_log;
    }

}