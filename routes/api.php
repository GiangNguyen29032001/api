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
            'status' => 200
        ];
    } else {
        return [
            'request' => $request,
            'message' => 'Thất bại',
            'status' => 401
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
            'status' => 401
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
            'status' => 200
        ];
    }
});

// dang bai
Route::post('/baiviet1', function () {
    $request = request()->all();

    // Hàm này dùng để insert mới dưới liệu
    DB::table('baiviet')->insert([
        'noidung' => $request['noidung'],
        'tieude' => $request['tieude'],
        'ngaythang' => date('Y-m-d H:s:i') // php có hàm date() dung de lay ngay hien tai hoac format lai ngay thang nam
    ]);
    return [
        'request' => $request,
        'message' => 'Them thanh cong',
        'status' => 200
    ];
});


// lay danh sach bai viet
Route::get('/danhsachbaiviet', function () {
    $result = DB::table('baiviet')->select('*')->orderBy('id_baiviet', 'desc')->get();
    return [
        'result' => $result,
        'message' => 'Lấy danh sách thanh cong',
        'status' => 200
    ];
});
//taobinhluanmoi
Route::post('/thembinhluan', function () {
    $request = request()->all();

    // Hàm này dùng để insert mới dưới liệu
    DB::table('binhluan')->insert([
        'noidungbinhuan' => $request['thembinhluan'],
        'ngaythang' => date('Y-m-d H:s:i')
    ]);
    return [
        'request' => $request,
        'message' => 'Them thanh cong',
        'status' => 200
    ];
});


//in binh luan ra
Route::get('/danhsachbinhluan', function () {
    $result = DB::table('binhluan')->select('*')->orderBy('id_binhluan', 'desc')->get();
    return [
        'result' => $result,
        'message' => 'comment thanh cong',
        'status' => 200
    ];
});
//xoa bai viet
Route::delete('/xoabinhluan', function () {
    $request = request()->all();
    $result = DB::table('binhluan')->where(['id_binhluan' => $request['id_binhluan'],])->delete();
    return [
        'result' => $result,
        'message' => 'xoa thanh cong',
        'status' => 200
    ];
});
