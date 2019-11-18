<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function successResponse($status = 200) {
        return response()->json(['data' => ['success' => true]], $status);
    }

    public function errorResponse($errors, $status = 422) {
        $data = ['errors' => []];

        if (is_array($errors)) {
            $data['errors'] = ['generic_error' => $errors];
        } else {
            $data['errors'] = ['generic_error' => [$errors]];
        }

        return response()->json($data, $status);
    }

    public function dataResponse($data, $status = 200) {
        return response()->json([
            'data' => $data
        ], $status);
    }

    public function notFound() {
        $error = ['errors' => ['not_found' => ['Resource not found']]];

        return response()->json($error, 404);
    }

    public function forbidden() {
        $error = ['errors' => ['forbidden' => ['Resource access forbidden']]];

        return response()->json($error, 403);
    }
}
