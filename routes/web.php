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
//Kiểm tra trước nhân viên đăng nhập rồi mới cho vào trang quản trị
#Route group dùng để gom nhóm các route lại  với nhau để dễ check
Route::group(['middleware' => ['checkNhanVien']], function () {

    Route::group(['prefix' => 'admin'], function () {
        Route::get('san-pham', 'SanPhamController@index')->name('san-pham');
        Route::post('xu-ly-them-san-pham', 'SanPhamController@store')->name('xu-ly-them-san-pham');
        Route::get('sua-san-pham/{id}','SanPhamController@edit')->name('sua-san-pham');
        Route::post('/xu-ly-sua-san-pham/{id}','SanPhamController@update')->name('xu-ly-sua-san-pham');
        Route::get('/danh-sach', 'LoaiSanPhamController@index')->name('danh-sach-loai');
        Route::post('/xu-ly-them-loai','LoaiSanPhamController@store')->name('xu-ly-them-loai');
        Route::get('/sua-loai-san-pham/{id}', 'LoaiSanPhamController@edit')->name('sua-loai-san-pham');
        Route::post('xu-ly-sua-loai/{id}', 'LoaiSanPhamController@update')->name('xu-ly-sua-loai');
        Route::get('/xoa-loai/{id}', 'LoaiSanPhamController@destroy')->name('xoa-loai-san-pham');
        Route::get('/loai-san-pham/tim-kiem', 'LoaiSanPhamController@timKiem')->name('tim-kiem-loai-san-pham');

        Route::get('don-hang', 'DonHangController@donHang')->name('don-hang');
        Route::get('chi-tiet-don-hang/{idDonHang}', 'DonHangController@chiTietDonHang')->name('chi-tiet-don-hang');
        Route::get('cap-nhat-trang-thai/{idDonHang}', 'DonHangController@capNhatTrangThai')->name('cap-nhat-trang-thai');
        Route::get('/tim-kiem-don-hang', 'DonHangController@timKiem')->name('tim-kiem-don-hang');
        Route::get('don-hang/khach-hang/{idCus}', 'DonHangController@getOrderByCus')->name('khach-hang.don-hang');
        Route::get('khach-hang', 'KhachHangController@getCus')->name('khach-hang');

        #thong ke
        Route::get('thong-ke', 'ThongKeController@index')->name('thong-ke');
    });
});

// Route::group(['middleware' => ['checkNhanVien']], function () {

// });

// Route::group(['prefix' => 'admin'], function () {
//     Route::get('san-pham', 'SanPhamController@index')->name('san-pham');
//     Route::post('xu-ly-them-san-pham', 'SanPhamController@store')->name('xu-ly-them-san-pham');
//     Route::get('sua-san-pham/{id}','SanPhamController@edit')->name('sua-san-pham');
//     Route::post('/xu-ly-sua-san-pham/{id}','SanPhamController@update')->name('xu-ly-sua-san-pham');
// });

#đăng nhập và đăng ký
Route::get('dang-nhap', 'AuthController@viewDangNhap')->name('login-admin');
Route::get('dang-ky', 'AuthController@viewDangKy')->name('register-admin');
Route::post('xu-ly-dang-ky','AuthController@xuLyDangKy')->name('xu-ly-dang-ky');
Route::post('xu-ly-dang-nhap', 'AuthController@xuLyDangNhap')->name('xu-ly-dang-nhap');



Route::get('dang-xuat-admin','AuthController@dangXuat')->name('dang-xuat-admin');





#Trang chủ
Route::get('/', 'TrangChuController@index')->name('trang-chu');
#Product detail
Route::get('/san-pham/{idProduct}', 'TrangChuController@productDetail')->name('trang-chu.chi-tiet-san-pham');
#Lấy sản phẩm theo loại sản phẩm
Route::get('/{idCategory}/sanpham', 'TrangChuController@getProductInCategory')->name('trang-chu.san-pham-theo-loai');


#giỏ hàng
Route::get('/them-gio-hang/{idProduct}','TrangChuController@addToCart')->name('them-gio-hang');//thêm sản phẩm nào đó vào giỏ hàng
Route::get('/them-nhieu-san-pham/{idProduct}','TrangChuController@addMoreProductToCart')->name('gio-hang.them-nhieu-san-pham');//thêm nhiều sản phẩm vào giỏ hàng
Route::get('/gio-hang', 'TrangChuController@cart')->name('gio-hang');//giỏ hàng
Route::get('/xoa-gio-hang','TrangChuController@clearCart')->name('xoa-gio-hang');//Xóa giỏ hàng
Route::get('/xoa-san-pham/{idProduct}', 'TrangChuController@clearOneProduct')->name('gio-hang.xoa-san-pham');

#đăng nhập, đăng xuất khách hàng
Route::post('/dang-nhap-khach-hang','KhachHangController@loginCus')->name('khach-hang.dang-nhap');
Route::get('/dang-xuat-khach-hang','KhachHangController@logoutCus')->name('khach-hang.dang-xuat');

#Thanh toán
Route::get('/thanh-toan', 'KhachHangController@thanhToan')->name('thanh-toan');
Route::post('/xu-ly-thanh-toan','KhachHangController@datHang')->name('dat-hang');

//Tinh thhanh pho
Route::get('tinh-thanh','TinhThanhController@index')->name('tinh-thanh');
Route::get('/{id}/quan-huyen', 'TinhThanhController@getTinh')->name('quan-huyen');
Route::get('/{id}/phuong-xa','TinhThanhController@getPhuong')->name('phuong-xa');
