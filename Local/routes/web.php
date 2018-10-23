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
Route::get('/', 'GaleryController@terbaru');
Route::get('/pp', 'GaleryController@terbaru')->name('pp');
Route::get('/yah', function () {return view('yah');});

Route::get('/daftar', function () {return view('member.daftar');});
Route::get('/lihat_paket', function () {
    return view('paket.lihat_paket');
});
Route::get('/eror', function () {
    return view('eror');
});
Route::get('coba', function () {
    return view('admin.template2');
});
 Route::get('/', 'HomeController@index')->name('coba');
Route::get('/input_pemesanan', function () {
    return view('pemesanan.input_pemesanan');
});
Route::get('/pemesanan/konfirmasi_pemesanan', function () {
    return view('pemesanan.pembayaran');
});
Route::get('get-curl', 'CurlController@getCURL');

Route::get('paket/{tipe}', 'PaketController@viewPaket');
Route::get('paketmember/{tipe}', 'PaketController@viewPaketMember');
 
    Route::get('/admin', function () {return view('admin.template');});
    // Route::get('/admin', 'UsersController@admin');

Route::get('galery/wedding', 'GaleryController@wedding');
Route::get('/', 'GaleryController@terbaru');
Route::get('galery/prewedding', 'GaleryController@prewedding');
Route::get('galery/foto_studio', 'GaleryController@foto_studio');
Route::get('aboutus', 'TestimoniController@aboutus');
//pemilik
Route::group(['middleware'=>['manager']], function() {  
      Route::get('pdfusermanager','UsersController@makePDF');
      Route::get('pdfpaketmanager','PaketController@makePDF');
      Route::get('pdfpemesananmanager','PemesananController@makePDF');
      Route::get('manager/edit/user/{id}', 'UsersController@edit_manager')->name('users.edit');
    Route::patch('users_manager/{id}', 'UsersController@update_manager')->name('users.update_manager');
});


Route::get('index', 'PemesananController@index'); 
Route::get('pilih_tanggal/{id_paket}', 'PemesananController@pilih_tanggal')->name('pilih_tanggal.pilih_tanggal');

Route::get('cek_pemesanan','PemesananController@search');
Route::get('cek', 'PemesananController@cek');

Route::post('testimoni/save', 'TestimoniController@store')->name('testimoni.store');
Route::post('laporan', 'LaporanController@index')->name('laporan.index');
Route::get('testimoni', 'TestimoniController@testimoni');

//member
Route::group(['middleware'=>['member']], function() { 
Route::get('homemember', 'MemberController@homemember')->name('homemember'); 
//user
    Route::get('index_user', 'UsersController@index');
    Route::get('create_users', 'UsersController@create')->name('users.create');
    Route::post('users/save', 'UsersController@store')->name('users.store');
    Route::get('member/edit/{id}', 'MemberController@edit')->name('member.edit');
    Route::patch('member/{id}', 'MemberController@update')->name('member.update');
    Route::delete('user/{index_user}', 'UsersController@destroy')->name('user.destroy');
    Route::get('users/{id}', 'UsersController@show')->name('user.show');
    Route::get('index_testi', 'TestimoniController@index');
     Route::delete('index_testi/{index_testi}', 'TestimoniController@destroy')->name('testi.destroy');  
      Route::patch('testi/{id}', 'TestimoniController@update')->name('testi.update');  
      Route::get('pdfuser','UsersController@makePDF');
      Route::get('pdfpaket','PaketController@makePDF');
      Route::get('pdfpemesanan','PemesananController@makePDF');

      Route::post('memberlogout', 'MemberController@logout')->name('member.logout');
      Route::get('member/edit/{id}', 'MemberController@edit')->name('member.edit');
    Route::patch('member/{id}', 'MemberController@update')->name('member.update');


      Route::get('detailpemesanan/member/{id_pesan}', 'DetailPemesananController@show_member')->name('detail_pemesanan_member.show'); 
      Route::get('detailpemesanan/edit/{id}', 'DetailPemesananController@edit_member')->name('detail_pemesanan_member.edit');
    Route::patch('detailpemesanan/{id_pesan}', 'DetailPemesananController@update_member')->name('detail_pemesanan_member.update');
     Route::get('index_detailpemesanan_member', 'DetailPemesananController@index_member');

     Route::get('pilih_tanggal/member/{id}', 'PemesananController@pilih_tanggal_member')->name('pilih_tanggal.pilih_tanggal_member');
Route::post('pemesanan/save', 'PemesananController@store')->name('pemesanan.store');
Route::get('pemberitahuan', 'PemesananController@pemberitahuan')->name('pemberitahuan');
Route::get('create_pemesanan', 'PemesananController@create')->name('pemesanan.create');

Route::get('create_konfirmasipembayaran', 'KonfirmasiPembayaranController@create')->name('konfirmasipembayaran.create');
Route::post('konfirmasipembayaran/save', 'KonfirmasiPembayaranController@store')->name('konfirmasipembayaran.store');
});
 Route::get('email/edit/{id_member}', 'MemberController@edit_email')->name('email.aktif');
//member login dan daftar
      Route::post('memberlogout', 'MemberController@logout')->name('member.logout');

Route::get('member/login', 'MemberController@login_page')->name('member.login');
Route::post('member/login', 'MemberController@login')->name('member.dologin');

Route::get('/multiuploads', 'UploadController@uploadForm');
Route::post('multiuploads', 'UploadController@uploadSubmit')->name('upload.store');

Route::get('register_member', 'MemberController@register')->name('member.register');
Route::post('register-save', 'MemberController@store')->name('member.store');

//karyawan dan kasir
Route::group(['middleware'=>['admin']], function() {  
    //paket
    //  Route::get('index_paket', 'PaketController@index');
    // Route::get('paketshow/{id}', 'PaketController@show')->name('paket.showw');
    // Route::get('create_paket', 'PaketController@create')->name('paket.create');
    // Route::post('paket/save', 'PaketController@store')->name('paket.store');
    // Route::delete('index_paket/{index_paket}', 'PaketController@destroy')->name('paket.destroy');
    // Route::get('paket/edit/{id}', 'PaketController@edit')->name('paket.edit');
    // Route::patch('paket/{id}', 'PaketController@update')->name('paket.update');
    // Route::get('create_email_paket', 'PaketController@create_email')->name('paket_email.create');
    // Route::post('paket_email/save', 'PaketController@store_email')->name('paket_email.store');
    // //galery
    // Route::get('index_galery', 'GaleryController@index');
    // Route::get('galery/{id}', 'GaleryController@show')->name('galery.show');
    // Route::get('create_galery', 'GaleryController@create')->name('galery.create');
    // Route::post('galery/save', 'GaleryController@store')->name('galery.store');
    // Route::delete('index_galery/{index_galery}', 'GaleryController@destroy')->name('galery.destroy');
    // Route::get('galery/edit/{id}', 'GaleryController@edit')->name('galery.edit');
    // Route::patch('galery/{id}', 'GaleryController@update')->name('galery.update');

    // //user 
    // Route::get('users/edit/{id}', 'UsersController@edit')->name('users.edit');
    // Route::patch('users/{id}', 'UsersController@update')->name('users.update');
    // //pemesanan
    // Route::get('index_pemesanan', 'PemesananController@index');
    // Route::get('index_pemesanan_admin', 'PemesananController@index_admin');
    // Route::get('index_harian', 'PemesananController@harian');
    // Route::get('pemesanan/{id_pesan}', 'PemesananController@show')->name('pemesanan.show');
    // Route::get('pemesanan/edit/{id_pesan}', 'PemesananController@edit')->name('pemesanan.edit');
    // Route::get('pemesanan/edit_admin/{id_pesan}', 'PemesananController@edit_admin')->name('pemesanan.edit_admin');
    // Route::patch('pemesanan/{id_pesan}', 'PemesananController@update')->name('pemesanan.update');
    //  Route::patch('pemesanan_admin/{id_pesan}', 'PemesananController@update_admin')->name('pemesanan.update_admin');
    // Route::delete('index_pemesanan/{index_pemesanan}', 'PemesananController@destroy')->name('pemesanan.destroy');
    // //pembayaran
    // Route::get('index_pembayaran', 'KonfirmasiPembayaranController@index'); 
    // Route::get('index_pembayaran_after', 'KonfirmasiPembayaranController@index_after'); 
    // Route::get('konfirmasipembayaran/{id_pesan}', 'KonfirmasiPembayaranController@show')->name('konfirmasipembayaran.show');
    // Route::get('konfirmasipembayaran/edit/{id_pesan}', 'KonfirmasiPembayaranController@edit')->name('konfirmasipembayaran.edit');
    // Route::patch('konfirmasipembayaran/{id_pesan}', 'KonfirmasiPembayaranController@update')->name('konfirmasipembayaran.update');
    //  Route::patch('kon2/{id_pesan}', 'KonfirmasiPembayaranController@update2')->name('konfirmasipembayaran.update2');
    // Route::delete('index_pembayaran/{index_pembayaran}', 'KonfirmasiPembayaranController@destroy')->name('konfirmasipembayaran.destroy');
    // //testimoni
    // Route::get('index_testi', 'TestimoniController@index');
    //  Route::delete('index_testi/{index_testi}', 'TestimoniController@destroy')->name('testi.destroy');  
    //   Route::patch('testi/{id}', 'TestimoniController@update')->name('testi.update');  
    //   Route::get('pdfuser','UsersController@makePDF');
    //   Route::get('pdfpaket','PaketController@makePDF');
    //   Route::get('pdfpemesanan','PemesananController@makePDF');

    //   //detail pemesanan (hasil foto)
    // Route::get('create_foto', 'DetailPemesananController@create')->name('detail_pemesanan.create');
    // Route::post('foto/save', 'DetailPemesananController@uploadSubmit')->name('detailpemesanan.store');
    //     Route::get('index_detailpemesanan', 'DetailPemesananController@index');

    //     Route::get('detailpemesanan/edit/{id_pesan}', 'DetailPemesananController@edit')->name('detailpemesanan.edit');
    // Route::get('detailpemesanan/{id_pesan}', 'DetailPemesananController@show')->name('detail_pemesanan.show');
    Route::get('index_user', 'UsersController@index');
    Route::get('create_users', 'UsersController@create')->name('users.create');
    Route::post('users/save', 'UsersController@store')->name('users.store');
  
    Route::delete('user/{index_user}', 'UsersController@destroy')->name('user.destroy');
    Route::get('users/{id}', 'UsersController@show')->name('user.show');
        Route::get('history.show', 'KonfirmasiPembayaranController@history');

    //  Route::get('create_lapes', 'LaporanController@create_lapes')->name('lap_pesan.create');
    // Route::post('lap_pesan/save', 'LaporanController@Lap_Pesan')->name('lap_pesan.store');
    // Route::get('history.show', 'KonfirmasiPembayaranController@history');
});
Route::group(['middleware'=>['karyawan']], function() {  
    //paket
     Route::get('index_paket', 'PaketController@index');
    Route::get('paketshow/{id}', 'PaketController@show')->name('paket.showw');
    Route::get('create_paket', 'PaketController@create')->name('paket.create');
    Route::post('paket/save', 'PaketController@store')->name('paket.store');
    Route::delete('index_paket/{index_paket}', 'PaketController@destroy')->name('paket.destroy');
    Route::get('paket/edit/{id}', 'PaketController@edit')->name('paket.edit');
    Route::patch('paket/{id}', 'PaketController@update')->name('paket.update');
    Route::get('create_email_paket', 'PaketController@create_email')->name('paket_email.create');
    Route::post('paket_email/save', 'PaketController@store_email')->name('paket_email.store');
    //galery
    Route::get('index_galery', 'GaleryController@index');
    Route::get('galery/{id}', 'GaleryController@show')->name('galery.show');
    Route::get('create_galery', 'GaleryController@create')->name('galery.create');
    Route::post('galery/save', 'GaleryController@store')->name('galery.store');
    Route::delete('index_galery/{index_galery}', 'GaleryController@destroy')->name('galery.destroy');
    Route::get('galery/edit/{id}', 'GaleryController@edit')->name('galery.edit');
    Route::patch('galery/{id}', 'GaleryController@update')->name('galery.update');

    //user 
    Route::get('users/edit/{id}', 'UsersController@edit')->name('users.edit');
    Route::patch('users/{id}', 'UsersController@update')->name('users.update');
    //pemesanan
     Route::get('index_pemesanan_admin', 'PemesananController@index_admin');
    Route::get('index_pemesanan', 'PemesananController@index');
    Route::get('index_pemesanan_admin', 'PemesananController@index_admin');
    Route::get('index_harian', 'PemesananController@harian');
    Route::get('pemesanan/{id_pesan}', 'PemesananController@show')->name('pemesanan.show');
    Route::get('pemesanan/edit/{id_pesan}', 'PemesananController@edit')->name('pemesanan.edit');
    Route::get('pemesanan/edit_admin/{id_pesan}', 'PemesananController@edit_admin')->name('pemesanan.edit_admin');
    Route::patch('pemesanan/{id_pesan}', 'PemesananController@update')->name('pemesanan.update');
     Route::patch('pemesanan_admin/{id_pesan}', 'PemesananController@update_admin')->name('pemesanan.update_admin');
    Route::delete('index_pemesanan/{index_pemesanan}', 'PemesananController@destroy')->name('pemesanan.destroy');
    Route::patch('pemesanan_admin/{id_pesan}', 'PemesananController@update_admin')->name('pemesanan.update_admin');
    Route::get('create_foto', 'DetailPemesananController@create')->name('detail_pemesanan.create');
    Route::post('foto/save', 'DetailPemesananController@uploadSubmit')->name('detailpemesanan.store');
        Route::get('index_detailpemesanan', 'DetailPemesananController@index');

        Route::get('detailpemesanan/edit/{id_pesan}', 'DetailPemesananController@edit')->name('detailpemesanan.edit');
    Route::get('detailpemesanan/{id_pesan}', 'DetailPemesananController@show')->name('detail_pemesanan.show');
    

     Route::get('create_lapes', 'LaporanController@create_lapes')->name('lap_pesan.create');
    Route::post('lap_pesan/save', 'LaporanController@Lap_Pesan')->name('lap_pesan.store');

});
Route::group(['middleware'=>['kasir']], function() {  
   Route::get('index_pembayaran', 'KonfirmasiPembayaranController@index'); 
    Route::get('index_pembayaran_after', 'KonfirmasiPembayaranController@index_after'); 
    Route::get('konfirmasipembayaran/{id_pesan}', 'KonfirmasiPembayaranController@show')->name('konfirmasipembayaran.show');
    Route::get('konfirmasipembayaran/edit/{id_pesan}', 'KonfirmasiPembayaranController@edit')->name('konfirmasipembayaran.edit');
    Route::patch('konfirmasipembayaran/{id_pesan}', 'KonfirmasiPembayaranController@update')->name('konfirmasipembayaran.update');
     Route::patch('kon2/{id_pesan}', 'KonfirmasiPembayaranController@update2')->name('konfirmasipembayaran.update2');
    Route::delete('index_pembayaran/{index_pembayaran}', 'KonfirmasiPembayaranController@destroy')->name('konfirmasipembayaran.destroy');
  });
    Route::get('users/edit/{id}', 'UsersController@edit')->name('users.edit');
    Route::patch('users/{id}', 'UsersController@update')->name('users.update');
Route::group(['middleware'=>['pemilik']], function() {  
     Route::get('create_lapes', 'LaporanController@create_lapes')->name('lap_pesan.create');
    Route::post('lap_pesan/save', 'LaporanController@Lap_Pesan')->name('lap_pesan.store');
  });
    Route::get('index_testi', 'TestimoniController@index');
     Route::delete('index_testi/{index_testi}', 'TestimoniController@destroy')->name('testi.destroy');  
      Route::patch('testi/{id}', 'TestimoniController@update')->name('testi.update');  
      Route::get('pdfuser','UsersController@makePDF');
      Route::get('pdfpaket','PaketController@makePDF');
      Route::get('pdfpemesanan','PemesananController@makePDF');
Route::get('/user/verify/{token}', 'MemberController@verifyUser');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home'); 