<?php

use Illuminate\Support\Facades\Route;

//mas adi tambahan
Route::get('pdf', [App\Http\Controllers\DashboardController::class, 'pdfview'])->name('pdfview');
Route::get('buatPdf', [App\Http\Controllers\DashboardController::class, 'buatPdf'])->name('buatPdf');
Route::get('/', [App\Http\Controllers\DashboardController::class, 'welcome'])->name('welcome');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/pendaftaran/pilih', [App\Http\Controllers\PendaftaranController::class, 'pilihpendaftaran'])->name('pilihpendaftaran');

Route::post('/invoice', [App\Http\Controllers\PembayaranController::class, 'invoice'])->name('invoice');
Route::post('/xendit', [App\Http\Controllers\PembayaranController::class, 'xendit'])->name('xendit');
Route::get('/xendit/success-payment/{noInv}', [App\Http\Controllers\PembayaranController::class, 'xenditSuccessPayment']);
Route::get('/xendit/failure-payment/{noInv}', [App\Http\Controllers\PembayaranController::class, 'xenditFailurePayment']);


Route::get('/baca-buku-ebook/{filename}', [App\Http\Controllers\PerpustakaanController::class, 'bacaebook'])->name('bacaebook');

//midleware auth
Route::middleware(['auth'])->group(function () {
    Route::get('isi-dashboard', [App\Http\Controllers\DashboardController::class, 'isiDashboard'])->name('isi-dashboard');
    //admin admin
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
    Route::post('/admin/store', [App\Http\Controllers\AdminController::class, 'store'])->name('admin-store');
    Route::get('/admin/all', [App\Http\Controllers\AdminController::class, 'all'])->name('admin-all');
    Route::get('/admin/edit', [App\Http\Controllers\AdminController::class, 'edit'])->name('admin-edit');
    Route::post('/admin/update', [App\Http\Controllers\AdminController::class, 'update'])->name('admin-update');
    Route::post('/admin/delete', [App\Http\Controllers\AdminController::class, 'delete'])->name('admin-delete');

    Route::post('/admin/excel', [App\Http\Controllers\AdminController::class, 'importadmin'])->name('admin-excel');

    //guru kelas
    Route::get('/kelas/guru', [App\Http\Controllers\KelasGuruController::class, 'index'])->name('kelas-guru');
    Route::post('/kelas/guru/store', [App\Http\Controllers\KelasGuruController::class, 'store'])->name('kelas-guru-store');
    Route::get('/kelas/guru/all', [App\Http\Controllers\KelasGuruController::class, 'all'])->name('kelas-guru-all');
    Route::get('/kelas/guru/edit', [App\Http\Controllers\KelasGuruController::class, 'edit'])->name('kelas-guru-edit');
    Route::post('/kelas/guru/update', [App\Http\Controllers\KelasGuruController::class, 'update'])->name('kelas-guru-update');
    Route::post('/kelas/guru/delete', [App\Http\Controllers\KelasGuruController::class, 'delete'])->name('kelas-guru-delete');

    //tahun ajaran
    Route::get('/tahun-ajaran', [App\Http\Controllers\TahunAjaranController::class, 'index'])->name('tahun-ajaran');
    Route::post('/tahun-ajaran/store', [App\Http\Controllers\TahunAjaranController::class, 'store'])->name('tahun-ajaran-store');
    Route::get('/tahun-ajaran/all', [App\Http\Controllers\TahunAjaranController::class, 'all'])->name('tahun-ajaran-all');
    Route::get('/tahun-ajaran/edit', [App\Http\Controllers\TahunAjaranController::class, 'edit'])->name('tahun-ajaran-edit');
    Route::post('/tahun-ajaran/update', [App\Http\Controllers\TahunAjaranController::class, 'update'])->name('tahun-ajaran-update');
    Route::post('/tahun-ajaran/delete', [App\Http\Controllers\TahunAjaranController::class, 'delete'])->name('tahun-ajaran-delete');


    Route::get('/tugas', [App\Http\Controllers\TugasController::class, 'index'])->name('tugas');
    Route::get('/buat_tugas', [App\Http\Controllers\TugasController::class, 'buat_tugas'])->name('buat_tugas');
    Route::post('/tugas/buat_soal', [App\Http\Controllers\TugasController::class, 'store_biasa'])->name('tugas-store-biasa');
    Route::post('/tugas/store', [App\Http\Controllers\TugasController::class, 'store'])->name('tugas-store_ajax');
    Route::get('/tugas/all', [App\Http\Controllers\TugasController::class, 'all'])->name('tugas-all');
    Route::get('/tugas/edit', [App\Http\Controllers\TugasController::class, 'edit'])->name('tugas-edit');
    Route::post('/tugas/update', [App\Http\Controllers\TugasController::class, 'update'])->name('tugas-update');
    Route::post('/tugas/delete', [App\Http\Controllers\TugasController::class, 'delete'])->name('tugas-delete');

    //halaman siswa
    Route::get('/jadwal-siswa', [App\Http\Controllers\SiswaController::class, 'jadwal_siswa'])->name('jadwal-siswa');

    //halaman guru
    Route::post('/guru-update-profile/{id}', [App\Http\Controllers\GuruController::class, 'edit_profile'])->name('guru-update-profile');

    //halaman admin
    Route::post('/admin-update-profile/{id}', [App\Http\Controllers\AdminController::class, 'edit_profile'])->name('admin-update-profile');

    // guru admin
    Route::get('/data-guru', [App\Http\Controllers\GuruController::class, 'index'])->name('guru');
    Route::post('/guru/store', [App\Http\Controllers\GuruController::class, 'store'])->name('guru-store');
    Route::get('/guru/all', [App\Http\Controllers\GuruController::class, 'all'])->name('guru-all');
    Route::get('/guru/edit', [App\Http\Controllers\GuruController::class, 'edit'])->name('guru-edit');
    Route::post('/guru/update', [App\Http\Controllers\GuruController::class, 'update'])->name('guru-update');
    Route::post('/guru/delete', [App\Http\Controllers\GuruController::class, 'delete'])->name('guru-delete');
    Route::post('/guru/excel', [App\Http\Controllers\GuruController::class, 'importguru'])->name('guru-excel');

    // kelas admin
    Route::get('/kelas', [App\Http\Controllers\KelasController::class, 'index'])->name('kelas');
    Route::get('/kelas/detail/{id}', [App\Http\Controllers\KelasController::class, 'detail'])->name('kelas_detail');
    Route::post('/kelas/store', [App\Http\Controllers\KelasController::class, 'store'])->name('kelas-store');
    Route::get('/kelas/all', [App\Http\Controllers\KelasController::class, 'all'])->name('kelas-all');
    Route::get('/kelas/edit', [App\Http\Controllers\KelasController::class, 'edit'])->name('kelas-edit');
    Route::post('/kelas/update', [App\Http\Controllers\KelasController::class, 'update'])->name('kelas-update');
    Route::post('/kelas/delete', [App\Http\Controllers\KelasController::class, 'delete'])->name('kelas-delete');

    // kelas admin
    Route::get('/jenjang', [App\Http\Controllers\JenjangpendidikanController::class, 'index'])->name('jenjang');
    Route::post('/jenjang/store', [App\Http\Controllers\JenjangpendidikanController::class, 'store'])->name('jenjang-store');
    Route::get('/jenjang/all', [App\Http\Controllers\JenjangpendidikanController::class, 'all'])->name('jenjang-all');
    Route::get('/jenjang/edit', [App\Http\Controllers\JenjangpendidikanController::class, 'edit'])->name('jenjang-edit');
    Route::post('/jenjang/update', [App\Http\Controllers\JenjangpendidikanController::class, 'update'])->name('jenjang-update');
    Route::post('/jenjang/delete', [App\Http\Controllers\JenjangpendidikanController::class, 'delete'])->name('jenjang-delete');

    // soal
    Route::get('/soal', [App\Http\Controllers\SoalController::class, 'index'])->name('soal');
    Route::post('/soal/store', [App\Http\Controllers\SoalController::class, 'store'])->name('soal-store');
    Route::post('/soal/storemulti', [App\Http\Controllers\SoalController::class, 'storemulti'])->name('soal-storemulti');
    Route::get('/soal/all/{id}', [App\Http\Controllers\SoalController::class, 'all'])->name('soal-all');
    Route::get('/soal/detail/{id}', [App\Http\Controllers\SoalController::class, 'detail'])->name('soal-detail');
    Route::get('/soal/edit', [App\Http\Controllers\SoalController::class, 'edit'])->name('soal-edit');
    Route::post('/soal/update', [App\Http\Controllers\SoalController::class, 'update'])->name('soal-update');
    Route::post('/soal/delete', [App\Http\Controllers\SoalController::class, 'delete'])->name('soal-delete');


    // pengaturan
    Route::get('/pengaturan', [App\Http\Controllers\PengaturanController::class, 'index'])->name('pengaturan');
    Route::post('/pengaturan/store', [App\Http\Controllers\PengaturanController::class, 'store'])->name('pengaturan-store');
    Route::get('/pengaturan/all', [App\Http\Controllers\PengaturanController::class, 'all'])->name('pengaturan-all');
    Route::get('/pengaturan/edit', [App\Http\Controllers\PengaturanController::class, 'edit'])->name('pengaturan-edit');
    Route::post('/pengaturan/update', [App\Http\Controllers\PengaturanController::class, 'update'])->name('pengaturan-update');
    Route::post('/pengaturan/delete', [App\Http\Controllers\PengaturanController::class, 'delete'])->name('pengaturan-delete');


    Route::post('/soal_insert', [App\Http\Controllers\SoalController::class, 'insert'])->name('soal_insert');

    Route::post('/ujian/store', [App\Http\Controllers\UjianController::class, 'store'])->name('ujian-store');
    Route::get('/tabel-ujian/{mata_pelajaran_id}/{tingkatan_id}/{jenjang_pendidikan_id}', [App\Http\Controllers\UjianController::class, 'tabelujian'])->name('tabelujian');
    Route::get('/ujian/all/{mata_pelajaran_id}/{tingkatan_id}/{jenjang_pendidikan_id}', [App\Http\Controllers\UjianController::class, 'all'])->name('ujian-all');
    Route::get('/ujian/all/walikelas', [App\Http\Controllers\UjianController::class, 'allwalkelas'])->name('ujian-all-walikelas');
    Route::get('/ujian/soal', [App\Http\Controllers\UjianController::class, 'SoalForm'])->name('SoalForm');
    Route::get('/ujian/soal/{id}', [App\Http\Controllers\UjianController::class, 'soal'])->name('ujian-soal');
    Route::get('/ujian/edit', [App\Http\Controllers\UjianController::class, 'edit'])->name('ujian-edit');
    Route::post('/ujian/update', [App\Http\Controllers\UjianController::class, 'update'])->name('ujian-update');
    Route::post('/ujian/delete', [App\Http\Controllers\UjianController::class, 'delete'])->name('ujian-delete');



    Route::get('/nilai', [App\Http\Controllers\NilaisController::class, 'index'])->name('nilai');
    Route::post('/nilai/store', [App\Http\Controllers\NilaisController::class, 'store'])->name('nilai-store');
    Route::get('/nilai/all', [App\Http\Controllers\NilaisController::class, 'all'])->name('nilai-all');
    Route::get('/nilai/edit', [App\Http\Controllers\NilaisController::class, 'edit'])->name('nilai-edit');
    Route::post('/nilai/update', [App\Http\Controllers\NilaisController::class, 'update'])->name('nilai-update');
    Route::post('/nilai/delete', [App\Http\Controllers\NilaisController::class, 'delete'])->name('nilai-delete');


    Route::get('/semester', [App\Http\Controllers\SemesterController::class, 'index'])->name('semester');
    Route::post('/semester/store', [App\Http\Controllers\SemesterController::class, 'store'])->name('semester-store');
    Route::get('/semester/all', [App\Http\Controllers\SemesterController::class, 'all'])->name('semester-all');
    Route::get('/semester/edit', [App\Http\Controllers\SemesterController::class, 'edit'])->name('semester-edit');
    Route::post('/semester/update', [App\Http\Controllers\SemesterController::class, 'update'])->name('semester-update');
    Route::post('/semester/delete', [App\Http\Controllers\SemesterController::class, 'delete'])->name('semester-delete');

    // kelas admin
    Route::get('/setting', [App\Http\Controllers\SettingController::class, 'index'])->name('setting');
    Route::post('/setting/store', [App\Http\Controllers\SettingController::class, 'store'])->name('setting-store');
    Route::get('/setting/all', [App\Http\Controllers\SettingController::class, 'all'])->name('setting-all');
    Route::get('/setting/edit', [App\Http\Controllers\SettingController::class, 'edit'])->name('setting-edit');
    Route::post('/setting/update', [App\Http\Controllers\SettingController::class, 'update'])->name('setting-update');
    Route::post('/setting/delete', [App\Http\Controllers\SettingController::class, 'delete'])->name('setting-delete');


    // tingkatans admin
    Route::get('/tingkatan', [App\Http\Controllers\TingkatanController::class, 'index'])->name('tingkatan');
    Route::post('/tingkatan/store', [App\Http\Controllers\TingkatanController::class, 'store'])->name('tingkatan-store');
    Route::get('/tingkatan/all', [App\Http\Controllers\TingkatanController::class, 'all'])->name('tingkatan-all');
    Route::get('/tingkatan/edit', [App\Http\Controllers\TingkatanController::class, 'edit'])->name('tingkatan-edit');
    Route::post('/tingkatan/update', [App\Http\Controllers\TingkatanController::class, 'update'])->name('tingkatan-update');
    Route::post('/tingkatan/delete', [App\Http\Controllers\TingkatanController::class, 'delete'])->name('tingkatan-delete');

    // kegiatan admin
    Route::get('/kegiatan/table', [App\Http\Controllers\KegiatanController::class, 'index'])->name('kegiatan_1');
    Route::get('/kegiatan/detail/{id}', [App\Http\Controllers\KegiatanController::class, 'detail'])->name('kegiatan-detail');
    Route::post('/kegiatan/store', [App\Http\Controllers\KegiatanController::class, 'store'])->name('kegiatan-store');
    Route::get('/kegiatan/all', [App\Http\Controllers\KegiatanController::class, 'all'])->name('kegiatan-all');
    Route::get('/kegiatan/edit', [App\Http\Controllers\KegiatanController::class, 'edit'])->name('kegiatan-edit');
    Route::post('/kegiatan/update', [App\Http\Controllers\KegiatanController::class, 'update'])->name('kegiatan-update');
    Route::post('/kegiatan/delete', [App\Http\Controllers\KegiatanController::class, 'delete'])->name('kegiatan-delete');
    Route::post('/kegiatan/deletegambarkegiatan', [App\Http\Controllers\KegiatanController::class, 'deletegambarkegiatan'])->name('deletegambarkegiatan');
    Route::post('/kegiatan/deletegambarkegiatan/lampiran', [App\Http\Controllers\KegiatanController::class, 'deletegambarkegiatanlampiran'])->name('deletegambarkegiatanlampiran');

    // berita admin
    Route::get('/berita-sekolah', [App\Http\Controllers\BeritaController::class, 'index'])->name('berita');
    Route::post('/berita/store', [App\Http\Controllers\BeritaController::class, 'store'])->name('berita-store');
    Route::get('/berita/all', [App\Http\Controllers\BeritaController::class, 'all'])->name('berita-all');
    Route::get('/berita/edit', [App\Http\Controllers\BeritaController::class, 'edit'])->name('berita-edit');
    Route::post('/berita/update', [App\Http\Controllers\BeritaController::class, 'update'])->name('berita-update');
    Route::post('/berita/delete', [App\Http\Controllers\BeritaController::class, 'delete'])->name('berita-delete');


    // perpustakaan Member admin
    Route::get('/perpustakaan_member', [App\Http\Controllers\PerpustakaanMemberController::class, 'index'])->name('perpustakaan_member');
    Route::post('/perpustakaan_member/store', [App\Http\Controllers\PerpustakaanMemberController::class, 'store'])->name('perpustakaan_member-store');
    Route::get('/perpustakaan_member/all', [App\Http\Controllers\PerpustakaanMemberController::class, 'all'])->name('perpustakaan_member-all');
    Route::get('/perpustakaan_member/edit', [App\Http\Controllers\PerpustakaanMemberController::class, 'edit'])->name('perpustakaan_member-edit');
    Route::post('/perpustakaan_member/update', [App\Http\Controllers\PerpustakaanMemberController::class, 'update'])->name('perpustakaan_member-update');
    Route::post('/perpustakaan_member/delete', [App\Http\Controllers\PerpustakaanMemberController::class, 'delete'])->name('perpustakaan_member-delete');


    // kurikulum admin
    Route::get('/kurikulum', [App\Http\Controllers\KurikulumController::class, 'index'])->name('kurikulum');
    Route::post('/kurikulum/store', [App\Http\Controllers\KurikulumController::class, 'store'])->name('kurikulum-store');
    Route::get('/kurikulum/all', [App\Http\Controllers\KurikulumController::class, 'all'])->name('kurikulum-all');
    Route::get('/kurikulum/edit', [App\Http\Controllers\KurikulumController::class, 'edit'])->name('kurikulum-edit');
    Route::post('/kurikulum/update', [App\Http\Controllers\KurikulumController::class, 'update'])->name('kurikulum-update');
    Route::post('/kurikulum/delete', [App\Http\Controllers\KurikulumController::class, 'delete'])->name('kurikulum-delete');


    // perpus admin
    Route::get('/perpustakaan', [App\Http\Controllers\PerpustakaanController::class, 'index'])->name('perpustakaan');
    Route::get('/perpustakaan/ajax', [App\Http\Controllers\PerpustakaanController::class, 'perpustakaanjenis'])->name('perpustakaanjenis');
    Route::post('/perpustakaan/store', [App\Http\Controllers\PerpustakaanController::class, 'store'])->name('perpustakaan-store');
    Route::get('/perpustakaan/all', [App\Http\Controllers\PerpustakaanController::class, 'all'])->name('perpustakaan-all');
    Route::get('/perpustakaan/edit', [App\Http\Controllers\PerpustakaanController::class, 'edit'])->name('perpustakaan-edit');
    Route::post('/perpustakaan/update', [App\Http\Controllers\PerpustakaanController::class, 'update'])->name('perpustakaan-update');
    Route::post('/perpustakaan/delete', [App\Http\Controllers\PerpustakaanController::class, 'delete'])->name('perpustakaan-delete');


    //halaman user
    Route::get('/profil', [App\Http\Controllers\SiswaController::class, 'edit_profile'])->name('profil');
    Route::get('/edit_profile', [App\Http\Controllers\SiswaController::class, 'edit_profile_page'])->name('edit_profile_page');
    // Route::get('/jadwal/siswa', [App\Http\Controllers\SiswaController::class, 'jadwal_siswa'])->name('jadwal-siswa');

    // siswa admin
    Route::get('/siswa', [App\Http\Controllers\SiswaController::class, 'index'])->name('siswa');
    Route::post('/siswa/store', [App\Http\Controllers\SiswaController::class, 'store'])->name('siswa-store');
    Route::get('/siswa/all', [App\Http\Controllers\SiswaController::class, 'all'])->name('siswa-all');
    Route::get('/siswa/edit', [App\Http\Controllers\SiswaController::class, 'edit'])->name('siswa-edit');
    Route::post('/siswa/update', [App\Http\Controllers\SiswaController::class, 'update'])->name('siswa-update');
    Route::post('/siswa/delete', [App\Http\Controllers\SiswaController::class, 'delete'])->name('siswa-delete');
    Route::get('/siswa/create', [App\Http\Controllers\SiswaController::class, 'create'])->name('siswa-create');
    Route::get('/siswa/edit/{id}', [App\Http\Controllers\SiswaController::class, 'edit_page'])->name('siswa-edit-page');
    Route::post('/siswa/update/{id}', [App\Http\Controllers\SiswaController::class, 'update_page'])->name('siswa-update-page');
    Route::post('/siswa/excel', [App\Http\Controllers\SiswaController::class, 'importsiswa'])->name('siswa-excel');
    Route::get('/siswa/export', [App\Http\Controllers\SiswaController::class, 'export'])->name('siswa-export');

    // mata pelajaran
    Route::get('/mata_pelajaran', [App\Http\Controllers\Mata_PelajaranController::class, 'index'])->name('mata_pelajaran');
    Route::post('/mata_pelajaran/store', [App\Http\Controllers\Mata_PelajaranController::class, 'store'])->name('mata_pelajaran-store');
    Route::get('/mata_pelajaran/all', [App\Http\Controllers\Mata_PelajaranController::class, 'all'])->name('mata_pelajaran-all');
    Route::get('/bahan-ajar/edit', [App\Http\Controllers\Mata_PelajaranController::class, 'editBahanAjarMataPelajaran'])->name('bahan-ajar-edit');
    Route::get('/mata_pelajaran/edit', [App\Http\Controllers\Mata_PelajaranController::class, 'edit'])->name('mata_pelajaran-edit');
    Route::post('/mata_pelajaran/update', [App\Http\Controllers\Mata_PelajaranController::class, 'update'])->name('mata_pelajaran-update');
    Route::post('/mata_pelajaran/delete', [App\Http\Controllers\Mata_PelajaranController::class, 'delete'])->name('mata_pelajaran-delete');

    // bahan ajar mata pelajaran
    Route::get('/bahan-ajar/{mata_pelajaran_id}', [App\Http\Controllers\BahanAjarMataPelajaranController::class, 'index'])->name('bahan-ajar');
    Route::post('/bahan-ajar/store', [App\Http\Controllers\BahanAjarMataPelajaranController::class, 'store'])->name('bahan-ajar-store');
    Route::get('/bahan-ajar/all/{mata_pelajaran_id}', [App\Http\Controllers\BahanAjarMataPelajaranController::class, 'all'])->name('bahan-ajar-all');
    Route::post('/bahan-ajar/update', [App\Http\Controllers\BahanAjarMataPelajaranController::class, 'update'])->name('bahan-ajar-update');
    Route::post('/bahan-ajar/delete', [App\Http\Controllers\BahanAjarMataPelajaranController::class, 'delete'])->name('bahan-ajar-delete');

    // ruangan
    Route::get('/ruangan', [App\Http\Controllers\RuanganController::class, 'index'])->name('ruangan');
    Route::post('/ruangan/store', [App\Http\Controllers\RuanganController::class, 'store'])->name('ruangan-store');
    Route::get('/ruangan/all', [App\Http\Controllers\RuanganController::class, 'all'])->name('ruangan-all');
    Route::get('/ruangan/edit', [App\Http\Controllers\RuanganController::class, 'edit'])->name('ruangan-edit');
    Route::post('/ruangan/update', [App\Http\Controllers\RuanganController::class, 'update'])->name('ruangan-update');
    Route::post('/ruangan/delete', [App\Http\Controllers\RuanganController::class, 'delete'])->name('ruangan-delete');

    Route::get('/datakelas', [App\Http\Controllers\Guru_KelasController::class, 'index'])->name('datakelas');
    Route::post('/datakelas/store', [App\Http\Controllers\Guru_KelasController::class, 'store'])->name('datakelas-store');
    Route::get('/datakelas/all', [App\Http\Controllers\Guru_KelasController::class, 'all'])->name('datakelas-all');
    Route::get('/datakelas/edit', [App\Http\Controllers\Guru_KelasController::class, 'edit'])->name('datakelas-edit');
    Route::post('/datakelas/update', [App\Http\Controllers\Guru_KelasController::class, 'update'])->name('datakelas-update');
    Route::post('/datakelas/delete', [App\Http\Controllers\Guru_KelasController::class, 'delete'])->name('datakelas-delete');

    // jadwal
    Route::get('/jadwal', [App\Http\Controllers\jadwalController::class, 'index'])->name('jadwal');
    Route::get('/jadwal/pilihjenjang', [App\Http\Controllers\jadwalController::class, 'pilihjenjang'])->name('pilihjenjang');
    Route::get('/jadwal/pilihkelas', [App\Http\Controllers\jadwalController::class, 'pilihkelas'])->name('pilihkelas');
    Route::post('/jadwal/store', [App\Http\Controllers\jadwalController::class, 'store'])->name('jadwal-store');
    Route::get('/jadwal/all', [App\Http\Controllers\jadwalController::class, 'all'])->name('jadwal-all');
    Route::get('/jadwal/data-jadwal-kelas', [App\Http\Controllers\jadwalController::class, 'DataKelasTable'])->name('jadwal-datajadwalkelas');
    Route::get('/jadwal/sma', [App\Http\Controllers\jadwalController::class, 'sma'])->name('jadwal-sma');
    Route::get('/jadwal/kelas', [App\Http\Controllers\jadwalController::class, 'kelas'])->name('jadwal-kelas');
    Route::get('/jadwal/kelasEdit', [App\Http\Controllers\jadwalController::class, 'kelasEdit'])->name('jadwal-kelasEdit');
    Route::get('/jadwal/kelas/edit', [App\Http\Controllers\jadwalController::class, 'kelas_edit'])->name('jadwal-kelas-edit');
    Route::get('/jadwal/edit', [App\Http\Controllers\jadwalController::class, 'edit'])->name('jadwal-edit');
    Route::post('/jadwal/update', [App\Http\Controllers\jadwalController::class, 'update'])->name('jadwal-update');
    Route::post('/jadwal/delete', [App\Http\Controllers\jadwalController::class, 'delete'])->name('jadwal-delete');


    Route::get('/jadwal/guru', [App\Http\Controllers\jadwalController::class, 'jadwal_buat_guru'])->name('jadwal_buat_guru');

    Route::get('/jadwal/semua_siswa/{id}', [App\Http\Controllers\jadwalController::class, 'jadwal_semua_siswa'])->name('jadwal-semua-siswa');

    Route::post('/jadwal/absen/massal', [App\Http\Controllers\AbsenController::class, 'absen_masal'])->name('absen-masal');
    Route::post('/jadwal/absen/satuan', [App\Http\Controllers\AbsenController::class, 'absen_satuan'])->name('absen_satuan');

    Route::get('/laporan-absen', [App\Http\Controllers\AbsenController::class, 'laporan_absen'])->name('laporan_absen');
    Route::get('/laporan-absen/page', [App\Http\Controllers\AbsenController::class, 'laporan_absen_admin_view'])->name('laporan_absen_admin_view');
    Route::get('/laporan-absen/admin', [App\Http\Controllers\AbsenController::class, 'laporan_absen_admin'])->name('laporan_absen_admin');
    Route::get('/laporan-absen/filter', [App\Http\Controllers\AbsenController::class, 'laporan_filter_absensi_siswa'])->name('filter_absensi_siswa');

    // kategori tagihan
    Route::get('/kategori/tagihan', [App\Http\Controllers\Kategori_TagihanController::class, 'index'])->name('kategori_tagihan');
    Route::post('/kategori/tagihan/store', [App\Http\Controllers\Kategori_TagihanController::class, 'store'])->name('kategori_tagihan-store');
    Route::get('/kategori/tagihan/all', [App\Http\Controllers\Kategori_TagihanController::class, 'all'])->name('kategori_tagihan-all');
    Route::get('/kategori/tagihan/edit', [App\Http\Controllers\Kategori_TagihanController::class, 'edit'])->name('kategori_tagihan-edit');
    Route::post('/kategori/tagihan/update', [App\Http\Controllers\Kategori_TagihanController::class, 'update'])->name('kategori_tagihan-update');
    Route::post('/kategori/tagihan/delete', [App\Http\Controllers\Kategori_TagihanController::class, 'delete'])->name('kategori_tagihan-delete');

    //siswa tagihan
    Route::get('/tagihan/siswa', [App\Http\Controllers\Tagihan_SiswaController::class, 'tagihan_siswa_web'])->name('tagihan_siswa_web');
    Route::post('/tagihan/siswa/total', [App\Http\Controllers\Tagihan_SiswaController::class, 'CekTotal'])->name('cektotal');
    Route::post('/tagihan/siswa/totaladmin', [App\Http\Controllers\Tagihan_SiswaController::class, 'CekTotaladmin'])->name('cektotaladmin');
    Route::post('/tagihan/siswa/hapus', [App\Http\Controllers\Tagihan_SiswaController::class, 'hapus'])->name('hapus');
    Route::post('/tagihan/siswa/hapus-admin', [App\Http\Controllers\Tagihan_SiswaController::class, 'hapusadmin'])->name('hapusadmin');
    Route::get('/tagihan/siswa/cek', [App\Http\Controllers\Tagihan_SiswaController::class, 'cek'])->name('cek');
    Route::get('/tagihan/siswa/cek-admin', [App\Http\Controllers\Tagihan_SiswaController::class, 'cekadmin'])->name('cekadmin');
    // Route::get('/tagihan/siswa/CekTotalView', [App\Http\Controllers\Tagihan_SiswaController::class, 'CekTotalView'])->name('CekTotalView');
    Route::post('/tagihan/siswa/CekTotalViewDelete', [App\Http\Controllers\Tagihan_SiswaController::class, 'CekTotalViewDelete'])->name('CekTotalViewDelete');
    Route::post('/tagihan/siswa/CekTotalViewDelete/admin', [App\Http\Controllers\Tagihan_SiswaController::class, 'CekTotalViewDeleteadmin'])->name('CekTotalViewDeleteadmin');
    Route::get('/tagihan/siswa/viewtampil', [App\Http\Controllers\Tagihan_SiswaController::class, 'viewtampil'])->name('viewtampil');
    Route::get('/tagihan/siswa/viewtampil-ajax', [App\Http\Controllers\Tagihan_SiswaController::class, 'ajaxgettagihanview'])->name('ajaxgettagihanview');
    Route::get('/tagihan/Pembayaran', [App\Http\Controllers\Tagihan_SiswaController::class, 'pembayaran'])->name('simpanpembayaran');
    Route::post('/tagihan/Pembayaran/admin', [App\Http\Controllers\Tagihan_SiswaController::class, 'pembayaranadmin'])->name('simpanpembayaranadmin');
    Route::get('/tagihan/Pembayaran/admin-massal/{id}', [App\Http\Controllers\Tagihan_SiswaController::class, 'pembayaranadminmassal'])->name('simpanpembayaranadminmassal');
    Route::get('/infotagihan/{id}', [App\Http\Controllers\Tagihan_SiswaController::class, 'infotagihan']);
    Route::post('/siswa/tagihan/store', [App\Http\Controllers\Tagihan_SiswaController::class, 'store'])->name('siswa_tagihan-store');
    Route::get('/siswa/tagihan/all/{jenjang_id}', [App\Http\Controllers\Tagihan_SiswaController::class, 'all'])->name('siswa_tagihan-all');
    Route::get('/siswa/tagihan/edit', [App\Http\Controllers\Tagihan_SiswaController::class, 'edit'])->name('siswa_tagihan-edit');
    Route::post('/siswa/tagihan/update', [App\Http\Controllers\Tagihan_SiswaController::class, 'update'])->name('siswa_tagihan-update');
    Route::post('/siswa/tagihan/delete', [App\Http\Controllers\Tagihan_SiswaController::class, 'delete'])->name('siswa_tagihan-delete');
    Route::get('detail-tagihan-daftar-siswa/{id/{jenjang}', [App\Http\Controllers\Invoice_TagihanController::class, 'daftarSiswa'])->name('siswa_tagihan-daftar');
    Route::get('detail-tagihan-daftar-siswa/{id_tagihan}/{id}', [App\Http\Controllers\Invoice_TagihanController::class, 'daftarSiswa_profile'])->name('siswa_tagihan-daftar-profile');
    Route::get('detail-tagihan-daftar-siswa-isi/{id}', [App\Http\Controllers\Invoice_TagihanController::class, 'daftarSiswaIsi'])->name('siswa_tagihan-daftar-isi');


    Route::get('/pembayaran', [App\Http\Controllers\PembayaranController::class, 'index'])->name('pembayaran');
    Route::get('/pembayaran/export', [App\Http\Controllers\PembayaranController::class, 'export'])->name('pembayaran-export');
    Route::get('/pembayaran/all', [App\Http\Controllers\PembayaranController::class, 'all'])->name('pembayaran-all');
    Route::get('/pembayaran/detail/{id}', [App\Http\Controllers\PembayaranController::class, 'detail'])->name('pembayaran-detail');


    Route::get('/pembayaran/siswa', [App\Http\Controllers\PembayaranController::class, 'PembayaranSiswa'])->name('PembayaranSiswa');
    Route::post('/filter/pembayaran', [App\Http\Controllers\PembayaranController::class, 'postPembayaranSiswa'])->name('postPembayaranSiswa');
    Route::get('/pembayaran/siswa/{id}', [App\Http\Controllers\PembayaranController::class, 'PembayaranSiswaDetail'])->name('PembayaranSiswaDetail');



    Route::get('/pendaftaran/siswa', [App\Http\Controllers\PendaftaranController::class, 'pendaftaran'])->name('pendaftaran');
    Route::get('/pendaftaran/siswa_sd', [App\Http\Controllers\PendaftaranController::class, 'pendaftaran_sd'])->name('pendaftaran_sd');
    Route::get('/pendaftaran/siswa_smp', [App\Http\Controllers\PendaftaranController::class, 'pendaftaran_smp'])->name('pendaftaran_smp');
    Route::get('/pendaftaran/halaman_step_1', [App\Http\Controllers\PendaftaranController::class, 'halaman_step_1'])->name('halaman_step_1');
    Route::get('/pendaftaran/step_1', [App\Http\Controllers\PendaftaranController::class, 'step_1'])->name('step_1');
    Route::get('/tbl_pendaftaran', [App\Http\Controllers\PendaftaranController::class, 'tbl_pendaftaran'])->name('tbl_pendaftaran');
    Route::post('/pendaftaran/siswa_lulus', [App\Http\Controllers\PendaftaranController::class, 'siswa_lulus'])->name('siswa_lulus');
    // Route::get('/pendaftaran/detail/{id}', [App\Http\Controllers\PembayaranController::class, 'detail'])->name('pembayaran-detail');



    Route::get('/pendaftaran/detail/{id}', [App\Http\Controllers\PendaftaranController::class, 'detail'])->name('pendaftaran-detail');
    Route::get('/pendaftaran/edit/{id}', [App\Http\Controllers\PendaftaranController::class, 'edit_edit'])->name('pendaftaran-edit_edit');
    Route::post('/pendaftaran/update/{id}', [App\Http\Controllers\PendaftaranController::class, 'update'])->name('pendaftaran-update');
    Route::get('/pendaftaran/all/{id}', [App\Http\Controllers\PendaftaranController::class, 'all'])->name('pendaftaran-all');
    Route::post('/pendaftaran/delete', [App\Http\Controllers\PendaftaranController::class, 'delete'])->name('pendaftaran-delete');
});
Route::get('/pendaftaran/halaman_step_1/portal', [App\Http\Controllers\PendaftaranController::class, 'halaman_step_1'])->name('halaman_step_1_portal');
Route::get('/pendaftaran/print', [App\Http\Controllers\PendaftaranController::class, 'print'])->name('print');
Route::get('/pendaftaran/print/{id}', [App\Http\Controllers\PendaftaranController::class, 'print_view'])->name('print_view');



Route::get('/jenjang/{id}', [App\Http\Controllers\jadwalController::class, 'jenjang']);

Route::post('/pendaftaran/store', [App\Http\Controllers\PendaftaranController::class, 'store'])->name('pendaftaran-store');
// Route::post('/pendaftaran/store_sd', [App\Http\Controllers\PendaftaranController::class, 'store_sd'])->name('pendaftaran-store_sd');
// Route::post('/pendaftaran/store_sd_smp', [App\Http\Controllers\PendaftaranController::class, 'store_smp'])->name('pendaftaran-store_smp');

Route::get('/ppdb', [App\Http\Controllers\DashboardController::class, 'ppdb'])->name('ppdb');
Route::get('/siswatokelas', [App\Http\Controllers\SiswaToKelasController::class, 'siswatokelas'])->name('siswatokelas');
Route::get('/siswatokelas-semua', [App\Http\Controllers\SiswaToKelasController::class, 'siswatokelas_get'])->name('siswatokelas_get');
Route::post('/siswatokelas-bagi', [App\Http\Controllers\SiswaToKelasController::class, 'SimpanBagiKelas'])->name('bagi-kelas');


Route::post('/invoice', [App\Http\Controllers\PembayaranController::class, 'invoice'])->name('invoice');
Route::post('/xendit', [App\Http\Controllers\PembayaranController::class, 'xendit'])->name('xendit');


Route::get('/data-siswa-didik', [App\Http\Controllers\WaliKelasController::class, 'WaliKelas'])->name('WaliKelas');
Route::get('/ajax-siswa-didik/{id}', [App\Http\Controllers\WaliKelasController::class, 'siswadidikajax'])->name('siswadidikajax');
Route::get('/profil/siswa/{id}', [App\Http\Controllers\WaliKelasController::class, 'profilsiwa'])->name('profilsiwa');
Route::get('/profil/siswa/get/{id}', [App\Http\Controllers\WaliKelasController::class, 'profilsiwaget'])->name('profilsiwaget');
Route::get('/get-siswa-didik/{id}', [App\Http\Controllers\WaliKelasController::class, 'WaliKelasGet'])->name('WaliKelasGet');
Route::post('/naik-kelas', [App\Http\Controllers\WaliKelasController::class, 'NaikKelas'])->name('NaikKelas');


// view
Route::get('/data-tugas-siswa', [App\Http\Controllers\TugasViewController::class, 'SiswaTampilTugas'])->name('SiswaTampilTugas');
Route::get('/data-tugas-siswa/edit', [App\Http\Controllers\TugasViewController::class, 'edit'])->name('tugas_edit');
Route::post('/data-tugas-siswa/update', [App\Http\Controllers\TugasViewController::class, 'update'])->name('tugas_update');
Route::get('/penilaian/siswa', [App\Http\Controllers\PenilaianController::class, 'penilaian'])->name('penilaian');
Route::post('/simpan-nilai', [App\Http\Controllers\PenilaianController::class, 'simpanNilai'])->name('SimpanNilai');

Route::get('/semua-kelas', [App\Http\Controllers\AdminNaikKelasController::class, 'semuakelas'])->name('semuakelas');
Route::get('/semua-kelas/{id}', [App\Http\Controllers\AdminNaikKelasController::class, 'datakelasadmin'])->name('datakelasadmin');
Route::post('/semua-kelas', [App\Http\Controllers\AdminNaikKelasController::class, 'datakelasadminstore'])->name('datakelasadminstore');

Route::get('/tk', [App\Http\Controllers\AdminNaikKelasController::class, 'tk'])->name('tk');
Route::get('/ajaxtk', [App\Http\Controllers\AdminNaikKelasController::class, 'Ajaxtk'])->name('Ajaxtk');
Route::get('/sd', [App\Http\Controllers\AdminNaikKelasController::class, 'sd'])->name('sd');
Route::get('/ajaxsd', [App\Http\Controllers\AdminNaikKelasController::class, 'AjaxSd'])->name('AjaxSd');
Route::get('/smp', [App\Http\Controllers\AdminNaikKelasController::class, 'smp'])->name('smp');
Route::get('/AjaxSmp', [App\Http\Controllers\AdminNaikKelasController::class, 'AjaxSmp'])->name('AjaxSmp');
Route::get('/sma', [App\Http\Controllers\AdminNaikKelasController::class, 'sma'])->name('sma');
Route::get('/AjaxSma', [App\Http\Controllers\AdminNaikKelasController::class, 'AjaxSma'])->name('AjaxSma');

// jadwam admin
Route::get('/jadwal-admin', [App\Http\Controllers\JadwalAdminController::class, 'index'])->name('jadwaladmin');
Route::post('/jadwal-admin/store', [App\Http\Controllers\JadwalAdminController::class, 'store'])->name('jadwaladmin-store');
Route::get('/jadwal-admin/all/{id}', [App\Http\Controllers\JadwalAdminController::class, 'all'])->name('jadwaladmin-all');
Route::get('/jadwal-admin/edit', [App\Http\Controllers\JadwalAdminController::class, 'edit'])->name('jadwaladmin-edit');
Route::post('/jadwal-admin/update', [App\Http\Controllers\JadwalAdminController::class, 'update'])->name('jadwaladmin-update');
Route::post('/jadwal-admin/delete', [App\Http\Controllers\JadwalAdminController::class, 'delete'])->name('jadwaladmin-delete');

//nilai
Route::get('/penilaian/tk', [App\Http\Controllers\PenilaianController::class, 'nilaitk'])->name('nilaitk');
// Route::get('/penilaian/tkajax', [App\Http\Controllers\PenilaianController::class, 'nilaitkajax'])->name('nilaitkajax');
Route::get('/penilaian/sd', [App\Http\Controllers\PenilaianController::class, 'nilaisd'])->name('nilaisd');
Route::get('/penilaian/smp', [App\Http\Controllers\PenilaianController::class, 'nilaismp'])->name('nilaismp');
Route::get('/penilaian/sma', [App\Http\Controllers\PenilaianController::class, 'nilaisma'])->name('nilaisma');
Route::get('/lihatnilai/{mata_pelajaran}', [App\Http\Controllers\PenilaianController::class, 'lihatnilai'])->name('lihatnilai');
Route::get('/lihatnilaiajax/{mata_pelajaran}/{kelas}', [App\Http\Controllers\PenilaianController::class, 'lihatnilaiajax'])->name('lihatnilaiajax');

Route::get('/editnilai/{mata_pelajaran}/{kelas}', [App\Http\Controllers\PenilaianController::class, 'editnilai'])->name('editnilai');
Route::post('/jadwal/export', [App\Http\Controllers\jadwalController::class, 'jadwalilport'])->name('jadwalilport');

Route::get('/tingkatanajax', [App\Http\Controllers\TingkatanController::class, 'tingkatanajax'])->name('tingkatanajax');
Route::get('/guru/nilai', [App\Http\Controllers\GuruMapelController::class, 'nilai'])->name('gurunilai');
Route::get('/menu', [App\Http\Controllers\MenuController::class, 'menu'])->name('menu');
Route::get('/menu/infosiswa', [App\Http\Controllers\MenuController::class, 'infosiswa'])->name('infosiswa');
Route::get('/menu/manage', [App\Http\Controllers\MenuController::class, 'manage'])->name('manage');
Route::get('/menu/manage/nilai', [App\Http\Controllers\MenuController::class, 'manageNilai'])->name('manageNilai');
Route::get('/menu/manage/jadwal', [App\Http\Controllers\MenuController::class, 'manageJadwal'])->name('manageJadwal');
Route::get('/menu/manage/tugas', [App\Http\Controllers\MenuController::class, 'manageTugas'])->name('manageTugas');
Route::get('/menu/manage/tugas/mata-pelajaran', [App\Http\Controllers\MenuController::class, 'manageTugasMataPelajaran'])->name('manageTugasMataPelajaran');
Route::get('/menu/manage/tugas/mata-pelajaran/guru', [App\Http\Controllers\MenuController::class, 'manageTugasMataPelajaranguru'])->name('manageTugasMataPelajaranguru');
Route::get('/menu/manage/tugas/mata-pelajaran/guru/jadwal', [App\Http\Controllers\MenuController::class, 'manageTugasMataPelajarangurujadwal'])->name('manageTugasMataPelajarangurujadwal');
Route::get('/menu/manage/tugas/mata-pelajaran/guru/jadwal/buat-tugas', [App\Http\Controllers\MenuController::class, 'manageTugasMataPelajarangurujadwalbuattugas'])->name('manageTugasMataPelajarangurujadwalbuattugas');


Route::get('/ajax/kelas', [App\Http\Controllers\Guru_KelasController::class, 'ajax'])->name('ajaxkelas');
Route::get('/ajax/ajaxlaporan', [App\Http\Controllers\Guru_KelasController::class, 'ajaxlaporan'])->name('ajaxlaporan');

Route::get('/menu/tagihan', [App\Http\Controllers\MenuController::class, 'viewTagihanmenu'])->name('viewTagihanmenu');
Route::get('/menu/tagihan/siswa', [App\Http\Controllers\MenuController::class, 'viewTagihansiswa'])->name('viewTagihansiswa');
//ajax buat tagihan siswa
Route::get('/siswa/tagihan-search', [App\Http\Controllers\Tagihan_SiswaController::class, 'ajax'])->name('ajaxsearch-tagihansiswa');
Route::get('/siswa/tagihan-search-siswa', [App\Http\Controllers\Tagihan_SiswaController::class, 'ajaxgetsiswa'])->name('ajaxsearch-tagihansiswanamasiswa');
Route::get('/siswa/tagihan-search-siswa-get', [App\Http\Controllers\Tagihan_SiswaController::class, 'ajaxgettagihan'])->name('ajaxsearch-tagihanAll');
//tagihan
Route::get('/siswa/tagihan', [App\Http\Controllers\Tagihan_SiswaController::class, 'index'])->name('siswa_tagihan');
Route::get('/siswa/tagihan/pilih-jenjang', [App\Http\Controllers\Tagihan_SiswaController::class, 'PilihJenjang'])->name('siswa_tagihan_pilih_jenjang');
Route::get('/siswa/tagihan/create', [App\Http\Controllers\Tagihan_SiswaController::class, 'create'])->name('siswa_tagihan_create');

//bayar tagihan
Route::get('/siswa/pilihan-search-bayar-tagihan', [App\Http\Controllers\Tagihan_SiswaController::class, 'search'])->name('searchbayartagihan');
Route::get('/siswa/bayar-tagihan/id-invoice', [App\Http\Controllers\Tagihan_SiswaController::class, 'bayartagihan'])->name('bayartagihan-id-invoice');
Route::get('/siswa/bayar-tagihan/nama-siswa', [App\Http\Controllers\Tagihan_SiswaController::class, 'searchNamaSiswa'])->name('bayartagihan-nama-siswa');

//belum-bayar tagihan
Route::get('/menu/tagihan/siswa/belumdibayar', [App\Http\Controllers\MenuController::class, 'viewTagihansiswabelumdibayar'])->name('viewTagihansiswabelumdibayar');
Route::get('/menu/tagihan/siswa/belumdibayar/pilih-kelas', [App\Http\Controllers\MenuController::class, 'viewTagihansiswabelumdibayarPilihKelas'])->name('viewTagihansiswabelumdibayarPilihKelas');
Route::get('/menu/tagihan/siswa/belumdibayar/pilih-tagihan', [App\Http\Controllers\MenuController::class, 'viewTagihansiswabelumdibayarPilihtagihan'])->name('viewTagihansiswabelumdibayarPilihtagihan');
Route::get('/menu/tagihan/siswa/belumdibayar/semua-tagihan', [App\Http\Controllers\MenuController::class, 'viewTagihansiswabelumdibayarsemuatagihan'])->name('viewTagihansiswabelumdibayarsemuatagihan');

// sudah-bayar tagihan
Route::get('/menu/tagihan/siswa/sudahbayar', [App\Http\Controllers\MenuController::class, 'viewTagihansiswasudahbayar'])->name('viewTagihansiswasudahbayar');
Route::get('/menu/tagihan/siswa/sudahbayar/pilih-kelas', [App\Http\Controllers\MenuController::class, 'viewTagihansiswasudahbayarPilihKelas'])->name('viewTagihansiswasudahbayarPilihKelas');
Route::get('/menu/tagihan/siswa/sudahbayar/pilih-tagihan', [App\Http\Controllers\MenuController::class, 'viewTagihansiswasudahbayarPilihtagihan'])->name('viewTagihansiswasudahbayarPilihtagihan');
Route::get('/menu/tagihan/siswa/sudahbayar/semua-tagihan', [App\Http\Controllers\MenuController::class, 'viewTagihansiswasudahbayarsemuatagihan'])->name('viewTagihansiswasudahbayarsemuatagihan');

Route::get('/menu/penerimaan-siswa', [App\Http\Controllers\MenuController::class, 'penerimaansiswa'])->name('penerimaansiswa');


Route::get('/menu/kenaikan-kelas', [App\Http\Controllers\MenuController::class, 'menukenaikankelas'])->name('menukenaikankelas');
Route::get('/menu/kenaikan-kelas-pilih', [App\Http\Controllers\MenuController::class, 'menukenaikankelaspilihkelas'])->name('menukenaikankelaspilihkelas');
Route::get('/menu/kenaikan-akses', [App\Http\Controllers\MenuController::class, 'menukenaikankelaspilihkelasakses'])->name('menukenaikankelaspilihkelasakses');


Route::get('/menu/jadwal/tugas', [App\Http\Controllers\jadwalController::class, 'menutugas'])->name('menutugas');
Route::get('/menu/jadwal/absen-massal', [App\Http\Controllers\jadwalController::class, 'menuabsenmassal'])->name('menuabsenmassal');
Route::get('/menu/jadwal/ubah-absen', [App\Http\Controllers\jadwalController::class, 'menuubahabsen'])->name('menuubahabsen');
Route::get('/menu/jadwal/siswa', [App\Http\Controllers\jadwalController::class, 'menusiswa'])->name('menusiswa');

Route::get('/menu/tugas/mata-pelajaran', [App\Http\Controllers\TugasController::class, 'pilihmatapelajaran'])->name('pilihmatapelajaran');
Route::get('/menu/tugas/tingkatan', [App\Http\Controllers\TugasController::class, 'pilihtingkatan'])->name('pilihtingkatan');
Route::get('/menu/tugas/kelas', [App\Http\Controllers\TugasController::class, 'pilihkelastugas'])->name('pilihkelastugas');


Route::get('/menu/ujian/jenjang', [App\Http\Controllers\UjianController::class, 'pilihjenjangujian'])->name('pilihjenjangujian');
Route::get('/menu/ujian/tingkatan', [App\Http\Controllers\UjianController::class, 'pilihtingkatanujian'])->name('pilihtingkatanujian');
Route::get('/menu/ujian/mata-pelajaran', [App\Http\Controllers\UjianController::class, 'pilihmatapelajaranujian'])->name('pilihmatapelajaranujian');
Route::get('/menu/ujian/walikelas', [App\Http\Controllers\UjianController::class, 'ujianwalikelas'])->name('ujianwalikelas');
Route::get('/menu/ujian/walikelas/{ujian_id}', [App\Http\Controllers\UjianController::class, 'ujianwalikelasdetail'])->name('ujianwalikelasdetail');
Route::get('/menu/ujian/walikelas/ajax/{ujian_id}', [App\Http\Controllers\UjianController::class, 'allwalkelasnilaiajax'])->name('allwalkelasnilaiajax');



Route::get('/menu/tugas/siswa', [App\Http\Controllers\TugasViewController::class, 'tugassiswa'])->name('tugassiswa');
Route::get('/menu/tugas/siswa/detail', [App\Http\Controllers\TugasViewController::class, 'tugassiswaview'])->name('tugassiswaview');
Route::get('/menu/tugas/siswa/detail/{id}', [App\Http\Controllers\TugasViewController::class, 'tugassiswaviewdetail'])->name('tugassiswaviewdetail');
// Route::get('/menu/jadwal/ujian', [App\Http\Controllers\jadwalController::class, 'menuujian'])->name('menuujian');

Route::get('/ujian/siswa', [App\Http\Controllers\SiswaUjianController::class, 'UjianSiswa'])->name('UjianSiswa');
Route::get('/ujian/siswa/soal/{id}', [App\Http\Controllers\SiswaUjianController::class, 'UjianSoal'])->name('UjianSoal');
Route::post('/ujian/siswa/soal/', [App\Http\Controllers\SiswaUjianController::class, 'JawabanUjian'])->name('JawabanUjian');
Route::get('/menu/tugas', [App\Http\Controllers\SiswaUjianController::class, 'menutugasshow'])->name('menutugasshow');
Route::get('/menu/tugas/kelas', [App\Http\Controllers\SiswaUjianController::class, 'menutugasshowkelas'])->name('menutugasshowkelas');
Route::get('/menu/tugas/kelas-show', [App\Http\Controllers\SiswaUjianController::class, 'menutugasshowkelaslihat'])->name('menutugasshowkelaslihat');
Route::get('/menu/tugas/kelas-detail', [App\Http\Controllers\SiswaUjianController::class, 'menutugasshowkelaslihatdetail'])->name('menutugasshowkelaslihatdetail');
Route::get('/menu/tugas/kelas-detail/{id}', [App\Http\Controllers\SiswaUjianController::class, 'menutugasshowkelaslihatdetaillihat'])->name('menutugasshowkelaslihatdetaillihat');
Route::get('/menu/tugas/kelas-detail/{kelas}/{matapelajaran}', [App\Http\Controllers\SiswaUjianController::class, 'menutugasshowkelaslihatdetaillihatmatapelajaran'])->name('menutugasshowkelaslihatdetaillihatmatapelajaran');
Route::get('/menu/tugas/kelas-detail/expired/{kelas}/{matapelajaran}', [App\Http\Controllers\SiswaUjianController::class, 'menutugasshowkelaslihatdetaillihatmatapelajaranexpired'])->name('menutugasshowkelaslihatdetaillihatmatapelajaranexpired');
Route::get('/menu/tugas/kelas-detail/berlangsung/{kelas}/{matapelajaran}', [App\Http\Controllers\SiswaUjianController::class, 'menutugasshowkelaslihatdetaillihatmatapelajaranberlangsung'])->name('menutugasshowkelaslihatdetaillihatmatapelajaranberlangsung');
Route::get('/menu/tugas/kelas-detail/admin/berlangsung/{kelas}/{matapelajaran}', [App\Http\Controllers\SiswaUjianController::class, 'menutugasshowkelaslihatdetaillihatmatapelajaranadminberlangsung'])->name('menutugasshowkelaslihatdetaillihatmatapelajaranadminberlangsung');
Route::get('/menu/tugas/kelas-detail/admin/expired/{kelas}/{matapelajaran}', [App\Http\Controllers\SiswaUjianController::class, 'menutugasshowkelaslihatdetaillihatmatapelajaranadminexpired'])->name('menutugasshowkelaslihatdetaillihatmatapelajaranadminexpired');
Route::get('/menu/tugas/kelas-detail/admin/{kelas}/{matapelajaran}', [App\Http\Controllers\SiswaUjianController::class, 'menutugasshowkelaslihatdetaillihatmatapelajaranadmin'])->name('menutugasshowkelaslihatdetaillihatmatapelajaranadmin');
Route::get('/menu/tugas/kelas-detail/tugas/{ujian_id}', [App\Http\Controllers\SiswaUjianController::class, 'getsiswa'])->name('getsiswatugas');
Route::get('/menu/tugas/kelas-detail/tugas/edit', [App\Http\Controllers\SiswaUjianController::class, 'tugasedit'])->name('tugaseditguru');
Route::get('/tugaseditgurudimmas', [App\Http\Controllers\SiswaUjianController::class, 'tugaseditgurudimmas'])->name('tugaseditgurudimmas');
Route::post('/tugaseditgurudimmas/update', [App\Http\Controllers\SiswaUjianController::class, 'tugaseditguruupdate'])->name('tugaseditguruupdate');
Route::get('/menu/tugas/siswa/{id}', [App\Http\Controllers\SiswaUjianController::class, 'getsiswa'])->name('tugassiswaall');
Route::get('/menu/tugas/siswa/admin/{id}', [App\Http\Controllers\SiswaUjianController::class, 'getsiswaadmin'])->name('tugassiswaalladmin');

Route::get('/menu/tugas/guru/kasih-nilai/{kumpul_tugas_id}', [App\Http\Controllers\SiswaUjianController::class, 'KasihNilai'])->name('KasihNilai');

Route::post('/pemberian-nilai', [App\Http\Controllers\NilaiController::class, 'pemberiannilaitugas'])->name('pemberiannilaitugas');


Route::get('/tanggalseleksi', [App\Http\Controllers\TanggalSeleksiController::class, 'index'])->name('tanggalseleksi');
Route::post('/tanggalseleksi/store', [App\Http\Controllers\TanggalSeleksiController::class, 'store'])->name('tanggalseleksi-store');
Route::get('/tanggalseleksi/all', [App\Http\Controllers\TanggalSeleksiController::class, 'all'])->name('tanggalseleksi-all');
Route::get('/tanggalseleksi/edit', [App\Http\Controllers\TanggalSeleksiController::class, 'edit'])->name('tanggalseleksi-edit');
Route::post('/tanggalseleksi/update', [App\Http\Controllers\TanggalSeleksiController::class, 'update'])->name('tanggalseleksi-update');
Route::post('/tanggalseleksi/delete', [App\Http\Controllers\TanggalSeleksiController::class, 'delete'])->name('tanggalseleksi-delete');


Route::get('/buktibayar-pilih-jenjang', [App\Http\Controllers\AbsensiSeleksiController::class, 'selectjenjangkonfirmasibuktibayar'])->name('selectjenjangkonfirmasibuktibayar-jenjang');
Route::get('/buktibayar-pilih-tingkatan', [App\Http\Controllers\AbsensiSeleksiController::class, 'selectjenjangkonfirmasibuktibayartingkatan'])->name('selectjenjangkonfirmasibuktibayar-jenjang-tingkatan');

Route::get('/tanggalseleksi-pilih-jenjang', [App\Http\Controllers\AbsensiSeleksiController::class, 'selectjenjang'])->name('seleksi-jenjang-absen');
Route::post('/tanggalseleksi-absen', [App\Http\Controllers\AbsensiSeleksiController::class, 'selectjenjangtingkatanabsen'])->name('absen-seleksi-massal');
Route::get('/tanggalseleksi-absen/search/{id}', [App\Http\Controllers\AbsensiSeleksiController::class, 'selectjenjangtingkatanabsensearch'])->name('absen-seleksi-massal-search');
Route::get('/ubah-status-konfirmasi/{idpendaftaran}', [App\Http\Controllers\AbsensiSeleksiController::class, 'ubahstatuskonfirmasi'])->name('ubahstatuskonfirmasi');

Route::get('/lihat-bukti-bayar', [App\Http\Controllers\AbsensiSeleksiController::class, 'buktibayaredit'])->name('bukti_bayar-edit');


Route::get('/seleksi-pilih-jenjang', [App\Http\Controllers\NilaiSeleksiController::class, 'selectjenjang'])->name('seleksi-jenjang-nilai');
Route::get('/pemberian-nilai-seleksi', [App\Http\Controllers\NilaiSeleksiController::class, 'pemberiannilai'])->name('seleksi-pemberiannilai');
Route::get('/pemberian-nilai-seleksi/tanggalseleksi', [App\Http\Controllers\NilaiSeleksiController::class, 'pemberiannilaitanggalseleksi'])->name('pemberiannilaitanggalseleksi');
Route::post('/pemberian-nilai-seleksi', [App\Http\Controllers\NilaiSeleksiController::class, 'pemberiannilaipost'])->name('seleksi-pemberiannilai-post');


Route::get('/siswa-pindahan', [App\Http\Controllers\SiswaPindahanController::class, 'selectjenjang'])->name('siswa-pindahan-jenjang');
Route::get('/siswa-pindahan/view', [App\Http\Controllers\SiswaPindahanController::class, 'selectjenjangview'])->name('siswa-pindahan-view-jenjang');
Route::get('/siswa-pindahan-kelas', [App\Http\Controllers\SiswaPindahanController::class, 'selectjenjangkelas'])->name('siswa-pindahan-kelas');
Route::get('/siswa-pindahan-form/{kelas_id}', [App\Http\Controllers\SiswaPindahanController::class, 'selectjenjangkelasform'])->name('siswa-pindahan-form-get');
Route::post('/siswa-pindahan-form', [App\Http\Controllers\SiswaPindahanController::class, 'selectjenjangkelasformsimpan'])->name('siswa-pindahan-form');
Route::get('/siswa-pindahan-view', [App\Http\Controllers\SiswaPindahanController::class, 'siswapindahan'])->name('siswapindahan');
Route::post('/siswa-pindahan-index', [App\Http\Controllers\SiswaPindahanController::class, 'siswapindahanindexpost'])->name('siswapindahanindexpost');
Route::get('/siswa-pindahan/table', [App\Http\Controllers\SiswaPindahanController::class, 'siswapin'])->name('siswa-pindahan-view');
Route::get('/siswa-pindahan/konfirmasi/{idpendaftaran}', [App\Http\Controllers\SiswaPindahanController::class, 'konfirmasiditerima'])->name('konfirmasi-diterima-siswa-pindahan');
Route::post('/siswa-pindahan/konfirmasi', [App\Http\Controllers\SiswaPindahanController::class, 'konfirmasiditerimapost'])->name('konfirmasi-diterima-siswa-pindahanpost');


Route::get('/bukti-pembayaran/{idpendaftaran}', [App\Http\Controllers\SiswaPindahanController::class, 'buktipembayaransiswaview'])->name('bukti-pembayaran-siswa-view');
Route::post('/bukti-pembayaran', [App\Http\Controllers\SiswaPindahanController::class, 'buktipembayaransiswa'])->name('bukti-pembayaran-siswa');


Route::get('/tableseleksi/{jenjang_pendidikan_id}', [App\Http\Controllers\SeleksiController::class, 'index'])->name('tableseleksi');
Route::get('/tableseleksi/detail/{id}', [App\Http\Controllers\SeleksiController::class, 'seleksidetail'])->name('seleksi-detail');



// tingkatans admin
Route::get('/bukukategori', [App\Http\Controllers\BukuKategoriController::class, 'index'])->name('bukukategori');
Route::post('/bukukategori/store', [App\Http\Controllers\BukuKategoriController::class, 'store'])->name('bukukategori-store');
Route::get('/bukukategori/all', [App\Http\Controllers\BukuKategoriController::class, 'all'])->name('bukukategori-all');
Route::get('/bukukategori/edit', [App\Http\Controllers\BukuKategoriController::class, 'edit'])->name('bukukategori-edit');
Route::post('/bukukategori/update', [App\Http\Controllers\BukuKategoriController::class, 'update'])->name('bukukategori-update');
Route::post('/bukukategori/delete', [App\Http\Controllers\BukuKategoriController::class, 'delete'])->name('bukukategori-delete');


Route::get('/daftar-ulang', [App\Http\Controllers\DaftarUlangController::class, 'daftarulang'])->name('daftarulang');
Route::get('/daftar-ulang/{idpendaftaran}', [App\Http\Controllers\DaftarUlangController::class, 'konfirmasiditerimadaftarulang'])->name('konfirmasi-daftar-ulang');
Route::post('/daftar-ulang/konfirmasi', [App\Http\Controllers\DaftarUlangController::class, 'konfirmasiditerimapost'])->name('konfirmasi-daftar-ulang-post');

Route::get('/daftar-ulang-siswa-baru', [App\Http\Controllers\DaftarUlangController::class, 'daftarulangsiswabaru'])->name('daftarulangsiswabaru');
Route::get('/kofirmasi-daftar-ulang-siswa-baru/{idseleksi}', [App\Http\Controllers\DaftarUlangController::class, 'daftarulangsiswabarukonfirmasi'])->name('daftarulangsiswabarukonfirmasi');
Route::post('/kofirmasi-daftar-ulang-siswa-baru', [App\Http\Controllers\DaftarUlangController::class, 'daftarulangsiswabarukonfirmasisiswabaru'])->name('daftarulangsiswabarukonfirmasisiswabaru');

Route::get('/tanggalseleksi-pilih-tingkatan/{jenjang}/{tanggal}', [App\Http\Controllers\AbsensiSeleksiController::class, 'selectjenjangtingkatan'])->name('seleksi-jenjang-tingkatan');
Route::get('/nilai-seleksi-view/{tanggalseleksi}', [App\Http\Controllers\NilaiSeleksiController::class, 'NilaiSeleksiView'])->name('NilaiSeleksiView');
Route::get('/nilai-seleksi-view/ajax/{tanggalseleksi}', [App\Http\Controllers\NilaiSeleksiController::class, 'NilaiSeleksiViewajax'])->name('NilaiSeleksiViewajax');
Route::post('/post-hasil-seleksi', [App\Http\Controllers\NilaiSeleksiController::class, 'postpenilaianseleksi'])->name('postpenilaianseleksi');
Route::post('/autocomplete-search-query/{jenjang}/{tanggalseleksi}', [App\Http\Controllers\PencarianController::class, 'show_data'])->name('autocomplete.search.query');
Route::get('/pemberian-nilai-seleksi/absen', [App\Http\Controllers\NilaiSeleksiController::class, 'pemberiannilaiabsen'])->name('pemberiannilaiabsen');


Route::get('/jadwal/{hari_id}', [App\Http\Controllers\jadwalController::class, 'jadwalpilih'])->name('jadwalpilih');
Route::get('/jadwal/guru/{hari_id}', [App\Http\Controllers\jadwalController::class, 'jadwalpilihguru'])->name('jadwalpilihguru');

require __DIR__ . '/auth.php';
