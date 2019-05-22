<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * @param $success
     * @param $message
     * @return JsonResponse
     */
    protected function messageResponse($success, $message)
    {
        return response()->json([
            'success' => $success,
            'message' => $message
        ]);
    }
}
