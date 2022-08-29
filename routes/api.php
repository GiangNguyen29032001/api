<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

Route::get('/test', function () {
    $request = request()->all();
    $result = DB::table('user')->where(['email' => $request['email']])->first();
    dd($result);
    if (!empty($result)) {
    }
});
Route::post('/dangnhap', function () {
    $request = request()->all();
    $result = DB::table('user')->where([
        'username' => $request['name'],
        'password' => $request['password']
    ])->first();

    if (!empty($result)) {
        return [
            'request' => $request,
            'result' => $result,
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
    /**
     * 
     * Tao user
     * tim user co username chua ton tai thi insert user
     * neu tim username da ton tai thi thong user da ton tai
     */
    $result = DB::table('user')->where([
        'username' => $request['name'],
    ])->first();

    if (!empty($result)) {
        return [
            'request' => $request,
            'result' => $result,
            'message' => 'user da ton tai',
            'status' => '401'
        ];
    } else {
        DB::table('user')->insert([
            'username' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password']
        ]);
        return [
            'request' => $request,
            'result' => $result,
            'message' => 'Them thanh cong',
            'status' => '200'
        ];
    }
});
