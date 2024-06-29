<?php

namespace App\Http\Controllers;

use App\CuaHang;
use App\DanhMuc;
use App\User;
use App\VatPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function getHome()
    {
        return view('admin.home');
    }


    public function taiKhoan()
    {
        return view('admin.tai-khoan');
    }

    public function danhMuc()
    {
        return view('admin.danh-muc');
    }

    public function vatPham()
    {
        return view('admin.vat-pham');
    }

    public function cuaHang()
    {
        return view('admin.cua-hang');
    }

    public function danhSachDanhMuc(Request $request)
    {
        $req = $request->all();
        $list = DanhMuc::where('ten', 'like', '%' . $req['key'] . '%')->with(['danhMucCha']);
        if ($request->has('child') && $request->child==true) {
            $list = $list->where('id_cha', '!=',null)->where('id_cha', '!=',0);
        }
        $total = $list->count();
        $data = $list->orderBy('created_at', 'DESC')->skip($req['start'])->take($req['limit'])->get();
        if (count($data)) {
            $res = [
                'rc' => '0',
                'data' => $data,
                'total' => $total
            ];
        } else {
            $res = [
                'rc' => '1',
                'rd' => 'Không tìm thấy bản ghi nào'
            ];
        }
        return json_encode($res);
    }

    public function suaCuaHang(Request $request)
    {
        Log::info('suaCuaHang');
        $req = $request->all();
        $check = CuaHang::where('id', $req['id'])->first();
        if ($check) {
            $check->ten_cua_hang = $request->ten_cua_hang;
            $check->chu_cua_hang = $request->chu_cua_hang;
            $check->so_dien_thoai = $request->so_dien_thoai;
            $check->dia_chi = $request->dia_chi;
            $check->ban_do = $request->ban_do;
            $check->save();
            $res = [
                'rc' => 0,
                'rd' => 'Cập nhật thành công',
            ];
        } else {
            $res = [
                'rc' => -1,
                'rd' => 'Không tìm thấy bản ghi tương ứng.',
            ];
        }

        return json_encode($res);
    }

    public function suaDanhMuc(Request $request)
    {

        $req = $request->all();
        $check = DanhMuc::where('id', $req['id'])->first();
        if ($check) {
            if ($request->file('hinh_anh')) {
                $hinhAnh = $request->file('hinh_anh');
                $filePathHinhAnh = '/images/danh-muc/' . uniqid() . '.' . $hinhAnh->extension();
                $hinhAnh->move(public_path('images/danh-muc'), $filePathHinhAnh);
                $check->avatar = $filePathHinhAnh;
            }
            $check->ten = $request->ten;
            $check->id_cha = $request->id_cha ? (int)$request->id_cha : null;
            $check->save();
            $res = [
                'rc' => 0,
                'rd' => 'Cập nhật thành công',
            ];
        } else {
            $res = [
                'rc' => -1,
                'rd' => 'Không tìm thấy bản ghi tương ứng.',
            ];
        }

        return json_encode($res);
    }


    public function xoaDanhMuc(Request $request)
    {

        $id = $request->id;
        $check = DanhMuc::where('id', $id)
            ->first();
        if (isset($check)) {
            $danh_muc_con = DanhMuc::where('id_cha', $id)->count();
            $vat_pham = VatPham::where('danh_muc', $id)->count();
            if ($danh_muc_con||$vat_pham) {
                $res = [
                    'rc' => '-1',
                    'rd' => 'Không thể xóa do đang tồn tại danh mục con hoặc vật phẩm'
                ];
            } else {
                $check->delete();
                $res = [
                    'rc' => '0',
                    'rd' => 'Xoá thành công'
                ];
            }
        } else {
            $res = [
                'rc' => '-1',
                'rd' => 'Không tìm thấy dữ  liệu cần xoá'
            ];
        }
        return json_encode($res);
    }

    public function xoaCuaHang(Request $request)
    {
        Log::info('xoaCuaHang');
        $id = $request->id;
        $check = CuaHang::where('id', $id)
            ->first();
        if (isset($check)) {
            $danh_muc_con = VatPham::where('cua_hang', $id)->count();
            if ($danh_muc_con) {
                $res = [
                    'rc' => '-1',
                    'rd' => 'Không thể xóa do đang tồn tại danh mục con'
                ];
            } else {
                $check->delete();
                $res = [
                    'rc' => '0',
                    'rd' => 'Xoá thành công'
                ];
            }
        } else {
            $res = [
                'rc' => '-1',
                'rd' => 'Không tìm thấy dữ  liệu cần xoá'
            ];
        }
        return json_encode($res);
    }
    public function suaVatPham(Request $request){

        Log::info('suaCuaHang');
        $req = $request->all();
        $check = VatPham::where('id', $req['id'])->first();
        if ($check) {
            $check->danh_muc = $request->danh_muc;
            $check->ten = $request->ten;
            $check->cua_hang = $request->cua_hang;
            $check->gia = $request->gia;
            $check->khuyen_mai = $request->khuyen_mai;
            $check->trang_thai = $request->trang_thai;
            $check->mo_ta = $request->mo_ta;
            $check->chi_tiet = $request->chi_tiet;
            $check->don_vi = $request->don_vi;
            $check->save();
            $res = [
                'rc' => 0,
                'rd' => 'Cập nhật thành công',
            ];
        } else {
            $res = [
                'rc' => -1,
                'rd' => 'Không tìm thấy bản ghi tương ứng.',
            ];
        }

        return json_encode($res);
    }
    public function themVatPham(Request $request)
    {
        $req = $request->all();
        Log::info('themVatPham');
        Log::info($req);
        if ($req['ten'] || true) {
            $imagePaths = [];
            if ($request->hasFile('hinh_anh')) {
                Log::info('Có hình ảnh');
                $images = $request->file('hinh_anh');
                Log::info($images);
                foreach ($images as $image) {
                    Log::info('image');
                    Log::info($image);
                    $filePathHinhAnh = '/images/vat-pham/' . uniqid() . '.' . $image->extension();
                    $image->move(public_path('images/vat-pham'), $filePathHinhAnh);
                    $imagePaths[] = $filePathHinhAnh;
                }
            }
            $newItem = VatPham::create([
                'ten' => $req['ten'],
                'danh_muc' => $req['danh_muc'],
                'cua_hang' => $req['cua_hang'],
                'gia' => $req['gia'],
                'khuyen_mai' => $req['khuyen_mai'],
                'trang_thai' => $req['trang_thai'],
                'mo_ta' => $req['mo_ta'],
                'chi_tiet' => $req['chi_tiet'],
                'don_vi' => $req['don_vi'],
                'slug' => Str::slug($req['ten'], '-').'-'.uniqid() ,
                'hinh_anh' => json_encode($imagePaths),
            ]);
            $res = [
                'rc' => 0,
                'rd' => 'Thêm vật phẩm thành công',
                'data' => $newItem
            ];
        } else {

            $res = [
                'rc' => -1,
                'rd' => 'Vui lòng bổ sung thông tin tên danh mục',
            ];
        }

        return json_encode($res);
    }
    function make_slug($string) {
        return preg_replace('/\s+/u', '-', trim($string));
    }
    public function themCuaHang(Request $request)
    {
        $req = $request->all();
        Log::info('themCuaHang');
        if ($req['ten_cua_hang'] && $req['chu_cua_hang'] && $req['so_dien_thoai'] && $req['dia_chi'] && $req['ban_do']) {
            $newItem = CuaHang::create([
                'ten_cua_hang' => $req['ten_cua_hang'],
                'chu_cua_hang' => $req['chu_cua_hang'],
                'so_dien_thoai' => $req['so_dien_thoai'],
                'dia_chi' => $req['dia_chi'],
                'ban_do' => $req['ban_do'],
            ]);
            $res = [
                'rc' => 0,
                'rd' => 'Thêm vật phẩm thành công',
                'data' => $newItem
            ];
        } else {

            $res = [
                'rc' => -1,
                'rd' => 'Vui lòng bổ sung thông tin tên danh mục',
            ];
        }

        return json_encode($res);
    }

    public function themDanhMuc(Request $request)
    {
        $req = $request->all();
        Log::info('themDanhMuc');
        if ($req['ten']) {
            $filePathHinhAnh = '';
            if ($request->file('hinh_anh')) {
                $hinhAnh = $request->file('hinh_anh');
                $filePathHinhAnh = '/images/danh-muc/' . uniqid() . '.' . $hinhAnh->extension();
                $hinhAnh->move(public_path('images/danh-muc'), $filePathHinhAnh);
            }
            $newItem = DanhMuc::create([
                'ten' => $req['ten'],
                'id_cha' => $req['id_cha'],
                'avatar' => $filePathHinhAnh,
            ]);
            $res = [
                'rc' => 0,
                'rd' => 'Thêm vật phẩm thành công',
                'data' => $newItem
            ];
        } else {

            $res = [
                'rc' => -1,
                'rd' => 'Vui lòng bổ sung thông tin tên danh mục',
            ];
        }

        return json_encode($res);
    }
    public function danhSachVatPham(Request $request)
    {
        Log::info('danhSachVatPham');
        Log::info($request->all());
        $req = $request->all();
        $list = VatPham::where('ten', 'like', '%' . $req['key'] . '%');
        if ($request->has('danh_muc')&&$req['danh_muc']) {
            $list = $list->where('danh_muc',  $req['danh_muc'] );
        }
        if ($request->has('cua_hang')&&$req['cua_hang']) {
        $list = $list->where('cua_hang',  $req['cua_hang'] );
    }
        $total = $list->count();
        $data = $list->orderBy('created_at', 'DESC')->with(['chuCuaHang','theLoai'])->skip($req['start'])->take($req['limit'])->get();
        if (count($data)) {
            $res = [
                'rc' => '0',
                'data' => $data,
                'total' => $total
            ];
        } else {
            $res = [
                'rc' => '1',
                'rd' => 'Không tìm thấy bản ghi nào'
            ];
        }
        return json_encode($res);
    }

    public function getListUser(Request $request)
    {
        Log::info('getListUser');
        Log::info($request->all());
        $req = $request->all();
        $list = User::where('name', 'like', '%' . $req['key'] . '%')->Orwhere('email', 'like', '%' . $req['key'] . '%');
        if ($request->has('role')) {
            $list = User::where('name', 'like', '%' . $req['key'] . '%')->where('role', $req['role'])->Orwhere('email', 'like', '%' . $req['key'] . '%')->where('role', $req['role']);
        }
        $total = $list->count();
        $data = $list->orderBy('created_at', 'DESC')->skip($req['start'])->take($req['limit'])->get();
        if (count($data)) {
            $res = [
                'rc' => '0',
                'data' => $data,
                'total' => $total
            ];
        } else {
            $res = [
                'rc' => '1',
                'rd' => 'Không tìm thấy bản ghi nào'
            ];
        }
        return json_encode($res);
    }

    public function danhSachCuaHang(Request $request)
    {
        Log::info('getListUser');
        Log::info($request->all());
        $req = $request->all();
        $list = CuaHang::where('ten_cua_hang', 'like', '%' . $req['key'] . '%');
        if ($request->has('chu_cua_hang') && $request->chu_cua_hang) {
            $list = CuaHang::where('ten_cua_hang', 'like', '%' . $req['key'] . '%')->where('chu_cua_hang', $req['chu_cua_hang']);
        }
        $total = $list->count();
        $data = $list->orderBy('created_at', 'DESC')->with('chu')->skip($req['start'])->take($req['limit'])->get();
        if (count($data)) {
            $res = [
                'rc' => '0',
                'data' => $data,
                'total' => $total
            ];
        } else {
            $res = [
                'rc' => '1',
                'rd' => 'Không tìm thấy bản ghi nào'
            ];
        }
        return json_encode($res);
    }

    public function deleteUser(Request $request)
    {

        $id = $request->id;
        $check = User::where('id', $id)
            ->first();
        if (isset($check)) {
            $check->delete();
            $res = [
                'rc' => '0',
                'rd' => 'Xoá thành công'
            ];
        } else {
            $res = [
                'rc' => '-1',
                'rd' => 'Không tìm thấy dữ  liệu cần xoá'
            ];
        }
        return json_encode($res);
    }

    public function updatePass(Request $request)
    {
        $checkUser = User::where('id', $request->user_id)->first();
        if ($checkUser) {
            $checkUser->password = Hash::make($request->mat_khau);
            $checkUser->save();
            $res = [
                'rc' => '0',
                'rd' => 'Đổi mật khẩu thành công'
            ];
        } else {
            $res = [
                'rc' => '-1',
                'rd' => 'Không tìm thấy dữ liệu'
            ];
        }
        return json_encode($res);
    }
}
