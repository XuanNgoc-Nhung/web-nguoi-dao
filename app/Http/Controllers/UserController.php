<?php

namespace App\Http\Controllers;

use App\CuaHang;
use App\DanhMuc;
use App\User;
use App\VatPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function getHome(){
        $list_cate = DanhMuc::where('id_cha',null)->orWhere('id_cha',0)->with('danhMucCon')->get();
        $list_cate_child = DanhMuc::where('id_cha','!=',null)->where('id_cha','!=',0)->with('sanPham')->get();
        return view('user.home',compact(['list_cate','list_cate_child']));
    }
    public function sanPhamTheoDanhMuc(Request $request,$slug){
        Log::info('sanPhamTheoDanhMuc');
        $list_cate = DanhMuc::where('id_cha',null)->orWhere('id_cha',0)->with('danhMucCon')->get();
        $danh_muc = DanhMuc::where('slug',$slug)->first();
        $san_pham = VatPham::where('danh_muc',$danh_muc->id)->get();
        return view('user.hang-hoa-theo-danh-muc',compact(['san_pham','list_cate','danh_muc']));

    }
    public function chiTietVatPham(Request $request,$slug){
        Log::info('sanPhamTheoDanhMuc');
        $san_pham = VatPham::where('slug',$slug)->first();
        $list_cate = DanhMuc::where('id_cha',null)->orWhere('id_cha',0)->with('danhMucCon')->get();
        $danh_muc = DanhMuc::where('id',$san_pham->danh_muc)->first();
        return view('user.chi-tiet-san-pham',compact(['san_pham','list_cate','danh_muc']));

    }
    public function getDangKy(){
        $list_cate = DanhMuc::where('id_cha',null)->orWhere('id_cha',0)->with('danhMucCon')->get();
        return view('user.dang-ky',compact(['list_cate']));
    }
    public function getDangNhap(){
        $list_cate = DanhMuc::where('id_cha',null)->orWhere('id_cha',0)->with('danhMucCon')->get();
        return view('user.dang-nhap',compact(['list_cate']));
    }
    public function heThongDaiLy(){
        $list_cate = DanhMuc::where('id_cha',null)->orWhere('id_cha',0)->with('danhMucCon')->get();
        $cua_hang = CuaHang::with('chu')->get();
        return view('user.he-thong-dai-ly',compact(['list_cate','cua_hang']));
    }
    public function gioHang(){
        $list_cate = DanhMuc::where('id_cha',null)->orWhere('id_cha',0)->with('danhMucCon')->get();
        return view('user.gio-hang',compact(['list_cate']));
    }
    public function tinTuc(){
        $list_cate = DanhMuc::where('id_cha',null)->orWhere('id_cha',0)->with('danhMucCon')->get();
        return view('user.tin-tuc',compact(['list_cate']));
    }

    public function dangKyTaiKhoan(Request $request)
    {
        Log::info('Đăng ký tài khoản');
        $req = $request->all();
        Log::info($req);
        if (isset($request->name) && isset($request->email) && isset($request->password)) {
            $checkUser = User::where('email', $request->email)->first();
            if ($checkUser) {
                $res = [
                    'rc' => '1',
                    'rd' => 'Số điện thoại đã được sử dụng',
                ];

            } else {
                Log::info('Tài khoản chưa có trên hệ thống');
                $newMember = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'role' => 0,
                    'status' => 1,
                    'password' => Hash::make($request->password)
                ]);
                Log::info($newMember);
                $infoLogin = array(
                    'email' => $request->email,
                    'password' => $request->password
                );
                $auth = Auth::attempt($infoLogin);
                if ($auth) {
                    $res = [
                        'rc' => '0',
                        'rd' => 'Đăng ký thành công',
                        'data' => $newMember,
                    ];
                } else {
                    $res = [
                        'rc' => '-1',
                        'rd' => 'Có lỗi trong quá trình đăng ký ',
                    ];
                }
            }
        } else {
            $res = [
                'rc' => '-1',
                'rd' => 'Bổ sung thông tin. ',
            ];
        }
        return json_encode($res);
    }

    public function dangNhapTaiKhoan(Request $request)
    {
        if (isset($request->email) && isset($request->password)) {
            $credentials = array(
                'email' => $request->email,
                'password' => $request->password
            );
            $auth = Auth::attempt($credentials);
            if ($auth) {
                if (Auth::user()->status == 1) {
                    $res = [
                        'rc' => '0',
                        'rd' => 'Đăng nhập thành công',
                        'data' => $auth
                    ];
                } else {
                    Auth::logout();
                    $res = [
                        'rc' => '-1',
                        'rd' => 'Tài khoản của bạn đang bị khóa. Vui lòng liên hệ admin để được hỗ trợ.',
                    ];
                }
            } else {
                $res = [
                    'rc' => '-1',
                    'rd' => 'Tài khoản hoặc mật khẩu không chính xác ',
                ];
            }
        } else {
            $res = [
                'rc' => '-1',
                'rd' => 'Bổ sung thông tin tài khoản/mật khẩu ',
            ];
        }
        return json_encode($res);
    }

}
