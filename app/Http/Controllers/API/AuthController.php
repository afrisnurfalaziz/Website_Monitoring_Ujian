<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ExamReg;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        $examId = $request->exam_id;
        $participantId = $request->participant_id;

        $user = ExamReg::where([
                ['exam_id', $examId],
                ['participant_id', $participantId],
            ])->with(['exam', 'participant', 'monitorings'])->get();

        if (count($user) != 0) {
            return response()->json([
                'code' => 200,
                'message' => 'Login success',
                'data' => $user,
            ], 200);
        } else {
            return response()->json([
                'code' => 401,
                'message' => 'Login gagal',
            ], 401);
        }
    }
}
