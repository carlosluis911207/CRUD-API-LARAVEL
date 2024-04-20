<?php

namespace App\Http\Controllers;

class BaseController extends Controller
{
    /* responses based https://github.com/cryptlex/rest-api-response-format */
    /**
     * success response method.
     *
     * @return string
     */

    public function sendResponse($result, $message = "", $code = 200)
    {
        $response = [
            'data'    => $result,
            'message' => $message,
            'code' => $code,
        ];

        return response()->json($response, 200);
    }

    /**
     * return error response.
     *
     * @return string
     */

    public function sendError($message, $errorMessages = [], $code = 400)
    {
        $response = [
            'message' => $message,
            'errors' => $errorMessages,
            'code' => $code
        ];

        return response()->json($response, 400);
    }
}
