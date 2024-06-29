<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/dang-ky', 'UserController@getDangKy')->name('user.getDangKy');
Route::get('/dang-nhap', 'UserController@getDangNhap')->name('user.getDangNhap');
Route::post('/post-dang-ky', 'UserController@dangKyTaiKhoan');
Route::post('/post-dang-nhap', 'UserController@dangNhapTaiKhoan');
Route::group(['prefix' => '', 'middleware' => []], function () {
    Route::get('/', 'UserController@getHome')->name('user.getHome');
    Route::get('/he-thong-dai-ly', 'UserController@heThongDaiLy')->name('user.heThongDaiLy');
    Route::get('/gio-hang', 'UserController@gioHang')->name('user.gioHang');
    Route::get('/tin-tuc', 'UserController@tinTuc')->name('user.tinTuc');
    Route::get('/danh-muc-{slug}', 'UserController@sanPhamTheoDanhMuc')->name('user.sanPhamTheoDanhMuc');
    Route::get('/san-pham-{slug}', 'UserController@chiTietVatPham')->name('user.chiTietSanPham');
});
Route::group(['prefix' => 'tai-khoan', 'middleware' => ['CheckLogin']], function () {
    Route::get('/', 'TaiKhoanController@trangChinh')->name('taiKhoan.trangChinh');
    Route::get('/don-hang', 'TaiKhoanController@donHang')->name('taiKhoan.donHang');
    Route::get('/doi-mat-khau', 'TaiKhoanController@doiMatKhau')->name('taiKhoan.doiMatKhau');
    Route::get('/dia-chi', 'TaiKhoanController@diaChi')->name('taiKhoan.diaChi');
});
Route::group(['prefix' => 'admin', 'middleware' => []], function () {
    Route::get('/', 'AdminController@getHome')->name('admin.getHome');
    Route::get('/tai-khoan', 'AdminController@taiKhoan')->name('admin.taiKhoan');
    Route::post('/list-user', 'AdminController@getListUser')->name('admin.getListUser');
    Route::post('/delete-user', 'AdminController@deleteUser')->name('admin.deleteUser');
    Route::post('/update-pass', 'AdminController@updatePass')->name('admin.updatePass');
//    Danh mục
    Route::get('/danh-muc', 'AdminController@danhMuc')->name('admin.danhMuc');
    Route::post('/them-danh-muc', 'AdminController@themDanhMuc')->name('admin.themDanhMuc');
    Route::post('/update-danh-muc', 'AdminController@suaDanhMuc');
    Route::post('/xoa-danh-muc', 'AdminController@xoaDanhMuc');
    Route::post('/danh-sach-danh-muc', 'AdminController@danhSachDanhMuc');
// Cửa hàng

    Route::get('/cua-hang', 'AdminController@cuaHang')->name('admin.cuaHang');
    Route::post('/danh-sach-cua-hang', 'AdminController@danhSachCuaHang');
    Route::post('/them-cua-hang', 'AdminController@themCuaHang');
    Route::post('/chinh-sua-cua-hang', 'AdminController@suaCuaHang');
    Route::post('/xoa-cua-hang', 'AdminController@xoaCuaHang');
//Sản phẩm
    Route::get('/vat-pham', 'AdminController@vatPham')->name('admin.vatPham');
    Route::post('/them-vat-pham', 'AdminController@themVatPham');
    Route::post('/chinh-sua-vat-pham', 'AdminController@suaVatPham');
    Route::post('/danh-sach-vat-pham', 'AdminController@danhSachVatPham');

    Route::get('/dia-chi', 'AdminController@getHome')->name('admin.diaChi');
    Route::get('/don-hang', 'AdminController@getHome')->name('admin.donHang');
    Route::get('/tin-tuc', 'AdminController@getHome')->name('admin.tinTuc');
});
