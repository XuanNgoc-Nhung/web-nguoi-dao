<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VatPham extends Model
{
    protected $fillable = [
        'danh_muc', 'hinh_anh','ten','cua_hang','gia','khuyen_mai','mo_ta','trang_thai','slug','don_vi','chi_tiet'
    ];
    protected $table = 'vat-pham';
    public function chuCuaHang(){
        return $this->hasOne(CuaHang::class,'id','cua_hang');
    }
    public function theLoai(){
        return $this->hasOne(DanhMuc::class,'id','danh_muc');
    }
}
