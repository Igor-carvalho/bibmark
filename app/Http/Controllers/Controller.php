<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Send a success response.
     *
     * @param string $response
     * @return \Illuminate\Http\Response
     */
    public function sendSuccess($result)
    {
    	$result['status'] = 1;

        return response()->json($result, 200);
    }

    /**
     * Send an error response.
     *
     * @param string $error
     * @param integer $code
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $code = 500)
    {
    	$result = [
            'status' => 0,
            'error' => $error
        ];

        return response()->json($result, $code);
    }
}
