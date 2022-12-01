<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Exam;

class ExamController extends Controller
{
    public function index()
    {
        $data = Exam::orderBy('updated_at', 'desc')->get();

        return response()->json([
            'code' => 200,
            'message' => 'Successfully',
            'data' => $data,
        ], 200);
    }
}
