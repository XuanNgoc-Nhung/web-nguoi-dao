<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuaHang extends Model
{
    protected $fillable = [
        'chu_cua_hang', 'ten_cua_hang','so_dien_thoai','dia_chi','ban_do'
    ];
    protected $table = 'cua-hang';
    public function chu(){
        return $this->hasOne(User::class,'id','chu_cua_hang');
    }
}
