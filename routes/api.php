<?php

use Illuminate\Support\Facades\Route;


Route::post('/register', [\App\Http\Controllers\Api\Auth\RegisterUserController::class, 'index']);
Route::post('/v1/login', [\App\Http\Controllers\Api\Auth\LoginUserController::class, 'index']);
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/me', [\App\Http\Controllers\Api\Auth\MeUserController::class, 'index']);
    Route::post('/logout', [\App\Http\Controllers\Api\Auth\LogoutUserController::class, 'index']);
});

Route::get('/v1/kategori-buku', [App\Http\Controllers\Api\BukuKategoriController::class, 'allCategoryBook'])->name('allCategoryBook');

Route::post('/v1/baca-buku-ebook', [App\Http\Controllers\PerpustakaanController::class, 'bacaebook'])->name('bacaebook');
Route::post('/upload-file', [\App\Http\Controllers\Api\AdminController::class, 'sendUploadDocument']);
Route::post('/api/v1/toggle-notifikasi', [\App\Http\Controllers\Api\NotifikasiController::class, 'ubahStatusNotifikasi']);

Route::get('/admin/all', [\App\Http\Controllers\Api\AdminController::class, 'all']);
Route::post('/admin/store', [\App\Http\Controllers\Api\AdminController::class, 'store']);
Route::get('/admin/edit', [\App\Http\Controllers\Api\AdminController::class, 'edit']);
Route::post('/admin/update', [\App\Http\Controllers\Api\AdminController::class, 'update']);
Route::delete('/admin/delete', [\App\Http\Controllers\Api\AdminController::class, 'delete']);



Route::post('/kategori/tagihan/store', [\App\Http\Controllers\Api\Kategory_tagihanController::class, 'store']);
Route::get('/kategori/tagihan/edit/{id}', [\App\Http\Controllers\Api\Kategory_tagihanController::class, 'edit']);
Route::post('/kategori/tagihan/update/{id}', [\App\Http\Controllers\Api\Kategory_tagihanController::class, 'update']);
Route::delete('/kategori/tagihan/delete/{id}', [\App\Http\Controllers\Api\Kategory_tagihanController::class, 'delete']);


Route::get('/pembayaran/all', [\App\Http\Controllers\Api\PembayaranController::class, 'all']);
Route::post('/v1/detail-pembayaran', [\App\Http\Controllers\Api\PembayaranController::class, 'pembayaran_detail']);
Route::post('/v1/riwayat-pembayaran', [\App\Http\Controllers\Api\PembayaranController::class, 'pembayaran_detail_satuan']);
Route::post('/v1/bayar-tagihan', [\App\Http\Controllers\Api\PembayaranController::class, 'xenditAdi']);



Route::post('/v1/bayar-tagihan-xendit', [\App\Http\Controllers\PembayaranController::class, 'xendit222']);


Route::post('/v1/checkout', [\App\Http\Controllers\Api\PembayaranController::class, 'checkout']);
Route::post('/v1/cek-status-bayar', [\App\Http\Controllers\Api\PembayaranController::class, 'check']);


Route::post('/v1/list-siswa', [\App\Http\Controllers\Api\SiswaController::class, 'all']);
Route::post('/v1/profil', [\App\Http\Controllers\Api\SiswaController::class, 'profil']);
Route::post('/v1/profil-guru', [\App\Http\Controllers\Api\SiswaController::class, 'profil_guru']);
Route::post('/v1/kurikulum', [\App\Http\Controllers\Api\SiswaController::class, 'kurikulum_all']);
Route::post('/v1/bahan-ajar', [\App\Http\Controllers\Api\SiswaController::class, 'kurikulum_all']);
Route::post('/siswa/store', [\App\Http\Controllers\Api\SiswaController::class, 'store']);
Route::get('/siswa/edit', [\App\Http\Controllers\Api\SiswaController::class, 'edit']);
Route::post('/siswa/update', [\App\Http\Controllers\Api\SiswaController::class, 'update']);
Route::delete('/siswa/delete', [\App\Http\Controllers\Api\SiswaController::class, 'delete']);


Route::get('/tagihan/siswa/all', [\App\Http\Controllers\Api\Tagihan_SiswaController::class, 'all']);
Route::post('/tagihan/siswa/store', [\App\Http\Controllers\Api\Tagihan_SiswaController::class, 'store']);
Route::get('/tagihan/siswa/edit/{id}', [\App\Http\Controllers\Api\Tagihan_SiswaController::class, 'edit']);
Route::post('/tagihan/siswa/update/{id}', [\App\Http\Controllers\Api\Tagihan_SiswaController::class, 'update']);
Route::delete('/tagihan/siswa/delete/{id}', [\App\Http\Controllers\Api\Tagihan_SiswaController::class, 'delete']);



Route::post('/v1/wishlist', [\App\Http\Controllers\Api\WishlistController::class, 'daftarWishlist']);
Route::post('/v1/simpan-wishlist', [\App\Http\Controllers\Api\WishlistController::class, 'simpanWishlist']);

// Route::get('/v1/kategori-keuangan', [\App\Http\Controllers\Api\Invoice_TagihanController::class, 'index']);

Route::get('/v1/kategori-keuangan', [\App\Http\Controllers\Api\Kategory_tagihanController::class, 'all']);
// Route::post('/tagihan/siswa', [\App\Http\Controllers\Api\Invoice_TagihanController::class, 'tagihan']);
Route::post('/v1/list-tagihan', [\App\Http\Controllers\Api\Invoice_TagihanController::class, 'tagihan_siswa']);
Route::post('/v1/list-laporan-keuangan', [\App\Http\Controllers\Api\Invoice_TagihanController::class, 'list_laporan_keuangan']);
Route::post('/v1/list-laporan-nilai', [\App\Http\Controllers\Api\Invoice_TagihanController::class, 'listnilai']);


Route::get('/callback', [\App\Http\Controllers\Api\Invoice_TagihanController::class, 'callbck']);
Route::post('/v1/kalender', [\App\Http\Controllers\Api\KegiatanController::class, 'dataKalender']);



Route::post('/v1/absen-siswa', [\App\Http\Controllers\Api\AbsensController::class, 'store']);
Route::post('/v1/absensi', [\App\Http\Controllers\Api\AbsensController::class, 'absensi']);
Route::post('/absen/absen_satuan', [\App\Http\Controllers\Api\AbsensController::class, 'absen_satuan']);
Route::post('/absen/absen_mandiri', [\App\Http\Controllers\Api\AbsensController::class, 'absen_mandiri']);

Route::post('/v1/list-absensi-ulang', [\App\Http\Controllers\Api\AbsensController::class, 'absensi_ulang']);
Route::post('/v1/simpan-absensi-ulang', [\App\Http\Controllers\Api\AbsensController::class, 'simpanAbsensiUlang']);
Route::post('/v1/absensi-list-siswa', [\App\Http\Controllers\Api\AbsensController::class, 'absensi_list']);


Route::get('/jadwal', [\App\Http\Controllers\Api\JadwalsController::class, 'index']);
Route::get('/jadwal/get_siswa_jadwal', [\App\Http\Controllers\Api\JadwalsController::class, 'get_siswa_jadwal']);
Route::get('/jadwal/ambil_semua_jadwal', [\App\Http\Controllers\Api\JadwalsController::class, 'ambil_semua_jadwal']);



Route::post('/v1/daftar-tugas', [\App\Http\Controllers\Api\TugasController::class, 'daftar_tugas']);
Route::post('/v1/detail-tugas', [\App\Http\Controllers\Api\TugasController::class, 'detail_tugas']);
Route::post('/v1/jadwal', [\App\Http\Controllers\Api\TugasController::class, 'jadwal']);
Route::post('/v1/jadwal-pelajaran', [\App\Http\Controllers\Api\TugasController::class, 'jadwal_pelajaran']);


//notifikasi
Route::post('/v1/notifikasi', [\App\Http\Controllers\Api\NotifikasiController::class, 'notifikasi']);
Route::post('/v1/toggle-notifikasi', [\App\Http\Controllers\Api\NotifikasiController::class, 'updatenotif']);

//laporan
Route::post('/v1/laporan-keuangan', [\App\Http\Controllers\Api\LaporanController::class, 'laporanKeuangan']);
Route::post('/v1/list-laporan-absen', [\App\Http\Controllers\Api\LaporanController::class, 'laporanabsen']);
Route::post('/v1/periode', [\App\Http\Controllers\Api\LaporanController::class, 'periode']);
Route::post('/v1/laporan-absen', [\App\Http\Controllers\Api\LaporanController::class, 'laporanabsenpdf']);
Route::post('/v1/laporan-nilai', [\App\Http\Controllers\Api\LaporanController::class, 'laporannilai']);

Route::post('/v1/perpustakaan', [\App\Http\Controllers\Api\PerpustakaanController::class, 'perpustakaan']);
Route::post('/v1/detail-buku-perpus', [\App\Http\Controllers\Api\PerpustakaanController::class, 'detail']);
Route::post('/v1/pinjam-perpus', [\App\Http\Controllers\Api\PerpustakaanController::class, 'pinjam']);

Route::post('/v1/detail-pinjam-buku', [\App\Http\Controllers\Api\PerpustakaanController::class, 'detailpinjambuku']);
Route::post('/v1/perpustakaan/detail-buku-perpus', [\App\Http\Controllers\Api\PerpustakaanController::class, 'bukuperpus']);

Route::post('/v1/perpustakaan/hasil-pencarian', [\App\Http\Controllers\Api\PerpustakaanController::class, 'hasilpencarian']);
Route::post('/v1/perpustakaan/ebook', [\App\Http\Controllers\Api\PerpustakaanController::class, 'ebook']);
Route::post('/v1/perpustakaan/fisik', [\App\Http\Controllers\Api\PerpustakaanController::class, 'fisik']);
Route::post('/v1/perpustakaan/cari-buku', [\App\Http\Controllers\Api\PerpustakaanController::class, 'caribuku']);
Route::post('/v1/perpustakaan/kategori', [\App\Http\Controllers\Api\PerpustakaanController::class, 'perpustakaankategori']);




Route::post('/dimmastesting', [App\Http\Controllers\Tagihan_SiswaController::class, 'TestingApi'])->name('TestingApi-store');

Route::post('/v1/home/carousel', [App\Http\Controllers\Api\BeritaController::class, 'index'])->name('api-berita');


Route::post('/tugas/buat_soal', [App\Http\Controllers\Api\TugasController::class, 'store_biasa']);


Route::post('/v1/detail-pelajaran', [App\Http\Controllers\Api\PelajaranController::class, 'DetailPelajaran']);
Route::post('/dimmasku', [App\Http\Controllers\Api\PelajaranController::class, 'dimmas']);

Route::post('/v1/tugas/kumpulkan-tugas', [App\Http\Controllers\Api\TugasController::class, 'uploudfile']);

Route::post('/v1/change-password', [App\Http\Controllers\Api\SiswaController::class, 'gantipassword']);
Route::post('/v1/forgot-password', [App\Http\Controllers\Api\SiswaController::class, 'resetpassword']);


Route::post('/v1/detail-kegiatan', [App\Http\Controllers\Api\KegiatanController::class, 'kegiatandetail']);

Route::post('/v1/detail-kurikulum', [App\Http\Controllers\Api\ApiKurikulumController::class, 'detail']);
