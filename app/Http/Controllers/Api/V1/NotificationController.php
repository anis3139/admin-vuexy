<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Deviceinformation;
use App\Models\News;
use Illuminate\Http\Request;
use Validator;

class NotificationController extends Controller
{
    public function index(){

        $url = 'https://fcm.googleapis.com/fcm/send';
        $token = 'AAAAP2tmdKA:APA91bGP3kyE1X9cE71mPKZ4nOpQR_dNX3vwmfgXxoF3mLAtin5GWnHhs3UantDTh1t90tSbeotCei7e7-htxdlezpJdC0wMsLZ-2Z_aKBHlc1tn4egFlWJlEKFjsbKbT7BJ36QkAbaX';
        $firebaseToken = Deviceinformation::whereNotNull('device_token')->pluck('device_token')->all();
        $data = News::latest()->first();
       $fields = [
           "registration_ids" => $firebaseToken,
           "notification" => [
               "title" => "Hello Vai",
               "body" => $data,
           ]
       ];

        $headers = array (
            'Content-Type: application/json',
            'Authorization:key = '.$token

        );
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($fields
        ));
        $result = curl_exec($ch);
        if($result === FALSE){
            die('Curl failed :'.curl_error($ch));
        }
        curl_close($ch);
        return $result ;
    }

}
