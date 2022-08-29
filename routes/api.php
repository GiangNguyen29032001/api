<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/test', function () {
    $request = request()->all();
    // if ($request['password'] === '111') {
    //     return [
    //         'message' => 'Thành công',
    //         'status' => 200
    //     ];
    // } else {
    //     return [
    //         'message' => 'Thất bại',
    //         'status' => 401
    //     ];
    // }
});
Route::post('/dangnhap', function () {
    $request = request()->all();
    if ($request['password'] === '111') {
        return [
            'request' => $request,
            'message' => 'Thành công',
            'status' => '200'
        ];
    } else {
        return [
            'request' => $request,
            'message' => 'Thất bại',
            'status' => '401'
        ];
    }
});
Route::post('/dangky', function () {
    $request = request()->all();
    if ($request['name'] === 'nguyen giang') {
        return [
            'request' => $request,
            'message' => 'Thành công',
            'status' => '200'
        ];
    } else {
        return [
            'request' => $request,
            'message' => 'Thất bại',
            'status' => '401'
        ];
    }
});