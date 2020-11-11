<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class KhachHangModel extends Authenticatable
{
     //Tên bảng
     protected $table = 'khachhang';
     //Khóa chính
     protected $primaryKey = 'kh_id';
     //Trường cần thêm
     protected $fillable = ['kh_hoten','kh_sdt','kh_diachi','username','password'];

     protected $hidden = [];
     protected $dates = [];
}
