<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function dataResponse($data, $status = 200) {
        return response()->json([
            'data' => $data
        ], $status);
    }

    public function successResponse($status = 200) {
        return response()->json(['success' => true], $status);
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
}
