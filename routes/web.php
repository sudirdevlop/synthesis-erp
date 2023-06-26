<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Transactions\TransactionUnitController;
use App\Http\Controllers\Transactions\TransactionBookingController;
use App\Http\Controllers\Transactions\TransactionPPJBController;
use App\Http\Controllers\Transactions\TransactionPerubahanJualController;
use App\Http\Controllers\Transactions\TransactionVoucherController;
use App\Http\Controllers\Transactions\TransactionProgressProjectController;
use App\Http\Controllers\Masters\BookingController;
use App\Http\Controllers\Masters\JenisProdukController;
use App\Http\Controllers\Masters\BlokController;
use App\Http\Controllers\Masters\TipeUnitController;
use App\Http\Controllers\Masters\KodeHadapController;
use App\Http\Controllers\Masters\KodeInfoController;
use App\Http\Controllers\Masters\KodeBerkasDocController;
use App\Http\Controllers\Masters\JenisFakturController;
use App\Http\Controllers\Masters\KodeFakturController;
use App\Http\Controllers\Masters\JenisBayarController;
use App\Http\Controllers\Masters\KodeBayarController;
use App\Http\Controllers\Masters\KodeBankController;
use App\Http\Controllers\Masters\KodeAgamaController;
use App\Http\Controllers\Masters\KodeUsahaController;
use App\Http\Controllers\Masters\KodeProfesiController;
use App\Http\Controllers\Masters\KodeKategoriController;
use App\Http\Controllers\Masters\KodeKotaController;
use App\Http\Controllers\Masters\KodeSalesController;
use App\Http\Controllers\Masters\KodeCustomerController;
use App\Http\Controllers\Masters\BankController;
use App\Http\Controllers\Reports\PersediaanController;
use App\Http\Controllers\Reports\PenjualanController;
use App\Http\Controllers\Reports\PerubahanController;
use App\Http\Controllers\Reports\FakturTagihanController;
use App\Http\Controllers\Reports\DaftarPenerimaanController;
use App\Http\Controllers\Reports\PiutangController;
use App\Http\Controllers\Reports\AgingController;
use App\Http\Controllers\Reports\PengembalianController;
use App\Http\Controllers\Reports\PpjbController;
use App\Http\Controllers\Reports\BerkasDokumenController;
use App\Http\Controllers\Reports\FakturPajakController;
use App\Http\Controllers\Reports\InvoiceController;

// monitoring dokumen
use App\Http\Controllers\MonitoringDokumen\MonitoringController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (auth()->check()) {
        return view('dashboard');
        // Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
    } else {
        return redirect()->route('login');
    }
});

// Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'index'])
//     ->middleware(['auth'])
//     ->name('dashboard');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('guest')->group(function () {
    Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'create'])->name('register');
    Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'store'])->name('register');
    Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
    Route::post('/login', [\App\Http\Controllers\LoginController::class, 'authenticate'])->name('login');
    Route::get('/forgot_password', [\App\Http\Controllers\LoginController::class, 'display_forgot_password'])->name('forgot_password');
    Route::post('/forgot_password', [\App\Http\Controllers\LoginController::class, 'forgot_password'])->name('forgot_password');
    Route::post('/reset_password', [\App\Http\Controllers\LoginController::class, 'reset_password'])->name('reset_password');
    Route::get('/reset_password', [\App\Http\Controllers\LoginController::class, 'display_reset_password'])->name('reset_password');

    
    Route::get('/login_document_monitoring', [\App\Http\Controllers\LoginController::class, 'login_document_monitoring'])->name('login_document_monitoring');
    
});



Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    # transaction
    // unit
    Route::get('/ar/transaction/unit', [TransactionUnitController::class, 'index'])->name('transaction_unit');
    
    // booking / tanda jadi
    Route::get('/ar/transaction/booking', [TransactionBookingController::class, 'index'])->name('transaction_booking');
    
    // ppjb
    Route::get('/ar/transaction/ppjb', [TransactionPPJBController::class, 'index'])->name('transaction_ppjb');
    
    // perubahan jual
    Route::get('/ar/transaction/perubahan_jual', [TransactionPerubahanJualController::class, 'index'])->name('transaction_perubahan_jual');
    
    // Voucher
    Route::get('/ar/transaction/voucher', [TransactionVoucherController::class, 'index'])->name('transaction_voucher');
    Route::get('/ar/transaction_voucher/add', [TransactionVoucherController::class, 'add'])->name('transaction_voucher.add');

    
    // perubahan jual
    Route::get('/ar/transaction/retention/progress_project', [TransactionProgressProjectController::class, 'index'])->name('transaction_retention_progress_project');


    # Master
    // booking
    Route::get('/ar/master/booking', [BookingController::class, 'index'])->name('master_booking');
    
    // jenis produk
    Route::get('/ar/master/jenis_produk', [JenisProdukController::class, 'index'])->name('master_jenis_produk');
    Route::post('/ar/master/jenis_produk', [JenisProdukController::class, 'store'])->name('master_jenis_produk');
    Route::delete('/ar/master/jenis_produk', [JenisProdukController::class, 'delete'])->name('master_jenis_produk');
    Route::get('/ar/master/jenis_produk/list', [JenisProdukController::class, 'list'])->name('master_jenis_produk.list');


    // blok
    Route::get('/ar/master/blok', [BlokController::class, 'index'])->name('master_blok');
    Route::post('/ar/master/blok', [BlokController::class, 'store'])->name('master_blok');
    Route::put('/ar/master/blok/{id}', [BlokController::class, 'by_id'])->name('master_blok');
    Route::delete('/ar/master/blok', [BlokController::class, 'delete'])->name('master_blok');
    Route::get('/ar/master/blok/list', [BlokController::class, 'list'])->name('master_blok.list');

    // unit
    Route::get('/ar/master/tipe_unit', [TipeUnitController::class, 'index'])->name('master_tipe_unit');
    Route::post('/ar/master/tipe_unit', [TipeUnitController::class, 'store'])->name('master_tipe_unit');
    Route::delete('/ar/master/tipe_unit', [TipeUnitController::class, 'delete'])->name('master_tipe_unit');
    Route::get('/ar/master/tipe_unit/list', [TipeUnitController::class, 'list'])->name('master_tipe_unit.list');
    
    // kode hadap
    Route::get('/ar/master/kode_hadap', [KodeHadapController::class, 'index'])->name('master_kode_hadap');
    Route::post('/ar/master/kode_hadap', [KodeHadapController::class, 'store'])->name('master_kode_hadap');
    Route::delete('/ar/master/kode_hadap', [KodeHadapController::class, 'delete'])->name('master_kode_hadap');
    Route::get('/ar/master/kode_hadap/list', [KodeHadapController::class, 'list'])->name('master_kode_hadap.list');
    
    // kode info
    Route::get('/ar/master/kode_info', [KodeInfoController::class, 'index'])->name('master_kode_info');    
    Route::post('/ar/master/kode_info', [KodeInfoController::class, 'store'])->name('master_kode_info');
    Route::delete('/ar/master/kode_info', [KodeInfoController::class, 'delete'])->name('master_kode_info');
    Route::get('/ar/master/kode_info/list', [KodeInfoController::class, 'list'])->name('master_kode_info.list');
    
    // kode berkas doc
    Route::get('/ar/master/kode_berkas_doc', [KodeBerkasDocController::class, 'index'])->name('master_kode_berkas_doc');
    

    // jenis faktur
    Route::get('/ar/master/jenis_faktur', [JenisFakturController::class, 'index'])->name('master_jenis_faktur'); 
    Route::post('/ar/master/jenis_faktur', [JenisFakturController::class, 'store'])->name('master_jenis_faktur');
    Route::put('/ar/master/jenis_faktur/{id}', [JenisFakturController::class, 'by_id'])->name('master_jenis_faktur');
    Route::delete('/ar/master/jenis_faktur', [JenisFakturController::class, 'delete'])->name('master_jenis_faktur');
    Route::get('/ar/master/jenis_faktur/list', [JenisFakturController::class, 'list'])->name('master_jenis_faktur.list'); 


    // kode faktur
    Route::get('/ar/master/kode_faktur', [KodeFakturController::class, 'index'])->name('master_kode_faktur'); 
    Route::post('/ar/master/kode_faktur', [KodeFakturController::class, 'store'])->name('master_kode_faktur');
    Route::put('/ar/master/kode_faktur/{id}', [KodeFakturController::class, 'by_id'])->name('master_kode_faktur');
    Route::delete('/ar/master/kode_faktur', [KodeFakturController::class, 'delete'])->name('master_kode_faktur');
    Route::get('/ar/master/kode_faktur/list', [KodeFakturController::class, 'list'])->name('master_kode_faktur.list'); 

    
    // jenis bayar
    Route::get('/ar/master/jenis_bayar', [JenisBayarController::class, 'index'])->name('master_jenis_bayar'); 
    Route::post('/ar/master/jenis_bayar', [JenisBayarController::class, 'store'])->name('master_jenis_bayar');
    Route::delete('/ar/master/jenis_bayar', [JenisBayarController::class, 'delete'])->name('master_jenis_bayar');
    Route::get('/ar/master/jenis_bayar/list', [JenisBayarController::class, 'list'])->name('master_jenis_bayar.list');
    // kode bayar
    Route::get('/ar/master/kode_bayar', [KodeBayarController::class, 'index'])->name('master_kode_bayar');  
    Route::post('/ar/master/kode_bayar', [KodeBayarController::class, 'store'])->name('master_kode_bayar');
    Route::delete('/ar/master/kode_bayar', [KodeBayarController::class, 'delete'])->name('master_kode_bayar');
    Route::get('/ar/master/kode_bayar/list', [KodeBayarController::class, 'list'])->name('master_kode_bayar.list'); 

    // kode bank
    Route::get('/ar/master/kode_bank', [KodeBankController::class, 'index'])->name('master_kode_bank');   
    
    // kode agama
    Route::get('/ar/master/kode_agama', [KodeAgamaController::class, 'index'])->name('master_kode_agama'); 
    Route::get('/ar/master/kode_agama/list', [KodeAgamaController::class, 'list'])->name('master_kode_agama.list');
    
    // kode usaha
    Route::get('/ar/master/kode_usaha', [KodeUsahaController::class, 'index'])->name('master_kode_usaha');   
    Route::post('/ar/master/kode_usaha', [KodeUsahaController::class, 'store'])->name('master_kode_usaha');
    Route::delete('/ar/master/kode_usaha', [KodeUsahaController::class, 'delete'])->name('master_kode_usaha');
    Route::get('/ar/master/kode_usaha/list', [KodeUsahaController::class, 'list'])->name('master_kode_usaha.list'); 
    
    // kode profesi
    Route::get('/ar/master/kode_profesi', [KodeProfesiController::class, 'index'])->name('master_kode_profesi');  
    Route::post('/ar/master/kode_profesi', [KodeProfesiController::class, 'store'])->name('master_kode_profesi');
    Route::delete('/ar/master/kode_profesi', [KodeProfesiController::class, 'delete'])->name('master_kode_profesi');
    Route::get('/ar/master/kode_profesi/list', [KodeProfesiController::class, 'list'])->name('master_kode_profesi.list'); 

    // kode kategori
    Route::get('/ar/master/kode_kategori', [KodeKategoriController::class, 'index'])->name('master_kode_kategori');  
    
    // kode kota
    Route::get('/ar/master/kode_kota', [KodeKotaController::class, 'index'])->name('master_kode_kota');  
    
    // kode sales
    Route::get('/ar/master/kode_sales', [KodeSalesController::class, 'index'])->name('master_kode_sales'); 
    
    // kode customer
    Route::get('/ar/master/kode_customer', [KodeCustomerController::class, 'index'])->name('master_kode_customer');
    
    // bank
    Route::get('/ar/master/bank', [BankController::class, 'index'])->name('master_bank');


    #Report
    // Persediaan
    Route::get('/ar/laporan_persediaan', [PersediaanController::class, 'index'])->name('laporan_persediaan'); 
    
    // Penjualan
    Route::get('/ar/laporan_penjualan', [PenjualanController::class, 'index'])->name('laporan_penjualan'); 
    
    // Perubahan
    Route::get('/ar/laporan_perubahan', [PerubahanController::class, 'index'])->name('laporan_perubahan'); 
    
    // FakturTagihan
    Route::get('/ar/laporan_faktur_tagihan', [FakturTagihanController::class, 'index'])->name('laporan_faktur_tagihan'); 
    
    // DaftarPenerimaan
    Route::get('/ar/laporan_daftar_penerimaan', [DaftarPenerimaanController::class, 'index'])->name('laporan_daftar_penerimaan'); 
    
    // Piutang
    Route::get('/ar/laporan_piutang', [PiutangController::class, 'index'])->name('laporan_piutang'); 
    
    // Aging
    Route::get('/ar/laporan_aging', [AgingController::class, 'index'])->name('laporan_aging'); 
    
    // Pengembalian
    Route::get('/ar/laporan_pengembalian', [PengembalianController::class, 'index'])->name('laporan_pengembalian'); 
    
    // Ppjb
    Route::get('/ar/laporan_ppjb', [PpjbController::class, 'index'])->name('laporan_ppjb'); 
    
    // Berkas Dokumen
    Route::get('/ar/laporan_berkas_dokumen', [BerkasDokumenController::class, 'index'])->name('laporan_berkas_dokumen'); 

    // Faktur Pajak
    Route::get('/ar/laporan_faktur_pajak', [FakturPajakController::class, 'index'])->name('laporan_faktur_pajak'); 

    // Ekspedisi Surat
    Route::get('/ar/laporan_invoice', [InvoiceController::class, 'index'])->name('laporan_invoice'); 

});

Route::middleware('auth')->group(function () {

    Route::redirect('/home', '/dashboard', 301)->name('home');

    Route::GET('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
    Route::GET('/logout_monitoring', [\App\Http\Controllers\LoginController::class, 'logout_monitoring'])->name('logout_monitoring');

    // document_monitoring    
    Route::get('/document_monitoring', [MonitoringController::class, 'index'])->name('document_monitoring');   
    Route::post('/document_monitoring', [MonitoringController::class, 'store'])->name('document_monitoring');
    Route::delete('/document_monitoring', [MonitoringController::class, 'delete'])->name('document_monitoring');
    Route::get('/document_monitoring/list', [MonitoringController::class, 'list'])->name('document_monitoring.list');
    Route::post('/upload_ktp', [MonitoringController::class, 'upload_ktp'])->name('upload_ktp'); 
    
});

