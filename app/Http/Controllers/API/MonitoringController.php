<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Monitoring;
use Exception;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    public function index()
    {
        $data = Monitoring::orderBy('updated_at', 'desc')->with('examReg')->get();

        return response()->json([
            'code' => 200,
            'message' => 'Successfully',
            'data' => $data,
        ], 200);
    }

    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        try {
            $request->validate([
                'exam_id' => 'required',
                'exam_reg_id' => 'required',
                'look_to' => 'required',
                'time' => 'required',
            ]);

            if ($request->hasfile('screenshot')) {

                $image = $request->file('screenshot');

                $new_image = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/images/monitoring/'), $new_image);

                $data = Monitoring::create([
                    'exam_id' => $request->exam_id,
                    'exam_reg_id' => $request->exam_reg_id,
                    'screenshot' => $new_image,
                    'look_to' => $request->look_to,
                    'time' => $request->time,
                ]);

                return response()->json([
                    'code' => 200,
                    'message' => 'Successfully',
                    'data' => $data,
                ], 200);
            } else {
                return response()->json([
                    'code' => 401,
                    'message' => 'Failed to take picture',
                ], 401);
            }
        } catch (Exception $error) {
            return response()->json([
                'code' => 500,
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }
}
