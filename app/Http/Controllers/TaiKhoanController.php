<?php

namespace App\Http\Controllers;

use App\DanhMuc;
use Illuminate\Http\Request;

class TaiKhoanController extends Controller
{
    public function trangChinh(){
        $list_cate = DanhMuc::where('id_cha',null)->orWhere('id_cha',0)->with('danhMucCon')->get();
        return view('user.tai-khoan.trang-chinh',compact(['list_cate']));
    }
    public function donHang(){

        $list_cate = DanhMuc::where('id_cha',null)->orWhere('id_cha',0)->with('danhMucCon')->get();
        return view('user.tai-khoan.don-hang',compact(['list_cate']));
    }
    public function doiMatKhau(){
        $list_cate = DanhMuc::where('id_cha',null)->orWhere('id_cha',0)->with('danhMucCon')->get();
        return view('user.tai-khoan.doi-mat-khau',compact(['list_cate']));
    }
    public function diaChi(){
        $list_cate = DanhMuc::where('id_cha',null)->orWhere('id_cha',0)->with('danhMucCon')->get();
        return view('user.tai-khoan.dia-chi',compact(['list_cate']));
    }
}
