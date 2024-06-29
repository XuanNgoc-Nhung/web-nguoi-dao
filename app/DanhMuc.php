<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    protected $fillable = [
        'id_cha', 'avatar','ten','slug'
    ];

    protected $table = 'danh-muc';

    public function danhMucCha(){
        return $this->hasOne(DanhMuc::class,'id','id_cha');
    }
    public function danhMucCon(){
        return $this->hasMany(DanhMuc::class,'id_cha','id');
    }
    public function sanPham(){
        return $this->hasMany(VatPham::class,'danh_muc','id');
    }
}
