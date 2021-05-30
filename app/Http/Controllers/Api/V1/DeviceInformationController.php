<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Deviceinformation;
use Illuminate\Http\Request;
use Validator;

class DeviceInformationController extends Controller
{
    public function index(){

        $device_information = Deviceinformation::all();

        if ($device_information->count() == 0) {
            $response = [
                'success' => 'false',
                'data' => '',
                'message' => " Device List Empty",
            ];
            return response()->json($response,400);
        }

        $response = [
            'success' => 'true',
            'data' => $device_information,
            'message' => " Device List Data",
        ];
        return response()->json($response,200);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'device_token' => 'required',
        ]);

        if($validator->fails()){
            $response = [
                'success' => 'false',
                'data' => 'Validation Error.',
                'message' => $validator->errors(),
            ];
            return response()->json($response,400);
        }

        $device_information = Deviceinformation::create([
            'device_token' => $request->device_token,
        ]);

        $response = [
            'success' => 'true',
            'data' => $device_information,
            'message' => 'Data Successfully Stored',
        ];
        return response()->json($response,200);
    }
}
