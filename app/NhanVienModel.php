<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class NhanVienModel extends Authenticatable
{
    //Tên bảng
    protected $table = 'nhanvien';
    //Khóa chính
    protected $primaryKey = 'nv_id';
    //Trường cần thêm
    protected $fillable = ['nv_ten','nv_email','username','password'];

    protected $hidden = [];
    protected $dates = [];
}
