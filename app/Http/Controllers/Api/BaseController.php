<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Collection;

class BaseController extends Controller
{

    use ValidatesRequests;

    /**
     * success response method.
     *
     * @param $message
     * @param $data
     * @param $code
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($message, $data, $code)
    {        
        $response = [
            'success' => true,
            'message' => $message,            
		];
        
        if(!empty($data)){
            $response['data'] = $data;
        }

        return response()->json($response, $code);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ];

        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }

    public function sendAuthError()
    {
        return $this->sendError('Unauthorised', "", 403);
    }

}