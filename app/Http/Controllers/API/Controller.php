<?php
namespace App\Http\Controllers\API;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController {
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function successJson( $message = '' , $data = [] ) {
    	return response()->json([
          	"message" => $message,
          	"data" => is_array($data) ? $data : [],
        ], 200);
    }

    public function errorJson( $message = '' , $errors = [] ) {
    	return response()->json([
          	"message" => $message,
          	"errors" => is_array($errors) ? $errors : [],
        ], 422);
    }

    public function replace_null_with_empty_string( $array ) {
        foreach ($array as $key => $value) {
            if(is_array($value)) {
                $array[$key] = $this->replace_null_with_empty_string($value);
            } else {
                if (is_null($value))
                    $array[$key] = "";
            }
        }
        return $array;
    }

}