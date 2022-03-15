<?php

namespace App\Http\Controllers\User\api;

use App\Http\Resources\user\api\CodeGenerateResource;
use App\Http\Requests\CheckNationalCode;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;

class CodeController extends Controller
{
    public function generate(): CodeGenerateResource
    {
        $code = Cache::store('redis')->rememberForever('national', function () {
            return json_decode(file_get_contents(public_path('nationalcode-location.json')), true);
        });
//        $code = json_decode(file_get_contents(public_path('nationalcode-location.json')), true);

        $code = rand(001, count($code) - 1);

        $number_length = strlen((string)$code);
        if ($number_length == 2) {
            $code = 0 . $code;
        }elseif ($number_length == 1){
            $code = 00 . $code;
        }

        $number = rand(100000, 999999);

        $number = $code . $number;

        $array = str_split($number);

        $sum = 0;

        foreach ($array as $key => $char) {
            $sum += ((10 - $key) * $char);
        }

        $result = $sum % 11;

        if ($result == 0) {
            $ctrl = 0;
        } elseif ($result == 1) {
            $ctrl = 1;
        } else {
            $ctrl = (11 - $result);
        }

        $national_code = $number . $ctrl;
        return new CodeGenerateResource($national_code);
    }


    public function check(CheckNationalCode $request)
    {
        return Lang::get('messages.valid_national_code');
    }


    public function check_city(CheckNationalCode $request)
    {
        $city_id = substr($request->post('code'), 0, 3);

        $code = Cache::store('redis')->rememberForever('national', function () {
            return json_decode(file_get_contents(public_path('nationalcode-location.json')), true);
        });

        if (!array_key_exists($city_id, $code)){
            return "استان و شهر کدملی در دیتابیس ثبت احوال یافت نشد!";
        }

        $result = $code[$city_id];

        return "استان" . ' : ' . $result['province']
            . " - " . " شهر " . ' : ' . $result['city'];
    }



}
