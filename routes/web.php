<?php
//Admin
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\KonferansController;
use App\Http\Controllers\Admin\YoneticiController;
use App\Http\Controllers\Admin\YoneticiKonferansaAtaController;
use App\Http\Controllers\HakemAdminController;
use App\Http\Controllers\HomeKonferansController;
//Yazar
use App\Http\Controllers\Yazar\YazarAdminController;
use App\Http\Controllers\Yazar\YazilarimController;
use App\Http\Controllers\Yazar\BasvuruController;

//Yonetici
use App\Http\Controllers\Yonetici\HakemController;
use App\Http\Controllers\Yonetici\HakemKonferansaAtaController;
use App\Http\Controllers\Yonetici\YoneticiAdminController;
use App\Http\Controllers\Yonetici\YoneticiKonferansController;
use App\Http\Controllers\Yonetici\YoneticiYazilarim;
use App\Http\Controllers\Yonetici\HakemeGonder;
use App\Http\Controllers\Yonetici\OnayDurumController;
// Hakem
use App\Http\Controllers\Hakem\GelenYazilarController;
// Base
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin
/*Route::middleware('auth')->group(function(){
   // Route::get('/admins','App\Http\Controllers\AdminsController@index')->name('admin.index');
    //Route::get('/admins',[YoneticiAdminController::class,'index'])->name('konferans_admin.index');
    //Route::get('/admins',[HakemAdminController::class,'index'])->name('hakem_admin.index');
    //Route::get('/admins',[YazarAdminController::class,'index'])->name('yazar_admin.index');

});
*/


//                              Admins

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'App\Http\Controllers\Controller@index')->name('index');

    //Admin admin

    Route::group(['middleware' => 'role:admin'], function () {

        Route::get('/admins', [AdminsController::class, 'index'])->name('admin.index');

        //*****************************************************************************

        //Admin Konferans
        Route::get('/admin/konferans_listele', [KonferansController::class, 'index'])->name('konferans.index');
        Route::post('/admin/konferans/store', [KonferansController::class, 'store'])->name('konferans.store');
        Route::get('/admin/konferans/{id}/edit', [KonferansController::class, 'edit'])->name('konferans.edit');
        Route::patch('/admin/konferans/{id}/update', [KonferansController::class, 'update'])->name('konferans.update');
        Route::delete('/admin/konferans/{id}/destroy', [KonferansController::class, 'destroy'])->name('konferans.destroy');
        Route::get('/admin/konferans/create', [KonferansController::class, 'create'])->name('konferans.create');

        //************************************************************************************
        //Admin Yonetici
        Route::get('/admin/yonetici/index', [YoneticiController::class, 'index'])->name('yonetici.index');
        Route::get('/admin/yonetici/create', [YoneticiController::class, 'create'])->name('yonetici.create');
        Route::post('/admin/yonetici/store', [YoneticiController::class, 'store'])->name('yonetici.store');
        Route::get('/admin/yonetici/{id}/edit', [YoneticiController::class, 'edit'])->name('yonetici.edit');
        Route::patch('/admin/yonetici/{id}/update', [YoneticiController::class, 'update'])->name('yonetici.update');
        Route::delete('/admin/yonetici/{id}/destroy', [YoneticiController::class, 'destroy'])->name('yonetici.destroy');


        //Admin YoneticiKonferansaAta
        Route::get('/admin/yonetici_ata/index', [YoneticiKonferansaAtaController::class, 'index'])->name('yoneticiKonferansaAta.index');
        Route::patch('/admin/yonetici_ata/{id}/update', [YoneticiKonferansaAtaController::class, 'update'])->name('yoneticiKonferansaAta.update');
        Route::get('/admin/yonetici_ata/{id}/destroy', [YoneticiKonferansaAtaController::class, 'destroy'])->name('yoneticiKonferansaAta.destroy');
    });

    //Admin admin End
    //#################################################################################################
    // Yonetici_Admin sayfasi
    Route::group(['middleware' => 'role:konferans_admin'], function () {
        //*************************** Konferans ***************************
        Route::get('/yonetici_admin', [YoneticiAdminController::class, 'index'])->name('konferans_admin');
        Route::get('/yonetici/konferans/{id}/edit', [YoneticiKonferansController::class, 'edit'])->name('yonetici_konferans.edit');
        Route::patch('/yonetici/konferans/{id}/update', [YoneticiKonferansController::class, 'update'])->name('yonetici_konferans.update');
        Route::get('/yonetici/konferans/aktif|pasif', [YoneticiKonferansController::class, 'index'])->name('yonetici_konferans_aktif_pasif.index');
        Route::delete('/yonetici/konferans/{id}/destroy', [YoneticiKonferansController::class, 'destroy'])->name('yonetici_konferans.destroy');
        //************************************************************
        // Yonetici Admin Hakem
        Route::get('/yonetici/hakem/index', [HakemController::class, 'index'])->name('hakem.index');
        Route::get('/yonetici/hakem/create', [HakemController::class, 'create'])->name('hakem.create');
        Route::post('/yonetici/hakem/store', [HakemController::class, 'store'])->name('hakem.store');
        Route::get('/yonetici/hakem/{id}/edit', [HakemController::class, 'edit'])->name('hakem.edit');
        Route::patch('/yonetici/hakem/{id}/update', [HakemController::class, 'update'])->name('hakem.update');
        Route::delete('/yonetici/hakem/{id}/destroy', [HakemController::class, 'destroy'])->name('hakem.destroy');
        //Yonetici Admin HakemKonferansaAta
        Route::get('/admin/hakem_ata', [HakemKonferansaAtaController::class, 'index'])->name('hakemKonferansaAta.index');
        Route::post('/admin/hakem_ata/{id}/store', [HakemKonferansaAtaController::class, 'store'])->name('hakemKonferansaAta.store');
        Route::get('/admin/hakem_ata/{id}/destroy', [HakemKonferansaAtaController::class, 'destroy'])->name('hakemKonferansaAta.destroy');
        //********************************************************************************
        //Yonetici Yazilarim
        Route::get('/yonetici/yazilarim/listele/index', [YoneticiYazilarim::class, 'index'])->name('yonetici_yazilarim_listele.index');
        Route::get('/yonetici/yazilarim/detayli/{id}/show', [YoneticiYazilarim::class, 'show'])->name('yonetici_yazilarim_listele.show');
        Route::get('/yonetici/yazilarim/hakem/gonder/index', [HakemeGonder::class, 'index'])->name('yonetici_yazilarim_hakeme_gonder_listele.index');
        Route::patch('/yonetici/yazilarim/hakem/gonder/{id}/update', [HakemeGonder::class, 'update'])->name('yonetici_yazilarim_hakeme_gonder.update');
        Route::get('/yonetici/yazilarim/hakem/onay-durum/index', [OnayDurumController::class, 'index'])->name('yonetici_yazilarim_onayDurum.index');
    });


    ////#################################################################################################
    /// Hakem_Admin
    ////#################################################################################################



    Route::group(['middleware' => 'role:hakem_admin'], function () {
        Route::get('/hakem_admin', [HakemAdminController::class, 'index'])->name('hakem_admin');
        Route::get('/hakem_admin/gelen-yazilar/index', [GelenYazilarController::class, 'index'])->name('hakem-admin_gelen-yazilar.index');
        Route::get('/hakem_admin/gelen-yazilar/{id}/show', [GelenYazilarController::class, 'show'])->name('hakem-admin_gelen-yazilar.show');
        Route::patch('/hakem_admin/gelen-yazilar/{id}/update', [GelenYazilarController::class, 'update'])->name('hakem-admin_gelen-yazilar.update');
    });


    ////#################################################################################################
    /// Hakem_Admin End
    ////#################################################################################################
    ////#################################################################################################
    /// Yazar Admin
    ////#################################################################################################

    Route::group(['middleware' => 'role:yazar_admin'], function () {
        Route::get('/yazar_admin', [YazarAdminController::class, 'index'])->name('yazar_admin');
        Route::get('/yazar/listele/index', [YazilarimController::class, 'index'])->name('yazar_admin.index');
        Route::get('/yazar/basvuruformu/create', [YazilarimController::class, 'create'])->name('yazar_admin.create');
        Route::post('/yazar/basvuruformu/store', [YazilarimController::class, 'store'])->name('yazar_admin.store');
        Route::get('/konferans/basvuru/{id}/show', [BasvuruController::class, 'show'])->name('basvuru.show');
        Route::get('/yazar/basvuruformu/{id}/edit', [YazilarimController::class, 'edit'])->name('yazar_admin_basvuru.edit');
        Route::patch('/yazar/basvuruformu/{id}/update', [YazilarimController::class, 'update'])->name('yazar_admin_basvuru.update');
        Route::delete('/yazar/basvuruformu/{id}/destroy', [YazilarimController::class, 'destroy'])->name('yazar_admin_basvuru.destroy');
    });
    ////#################################################################################################
    /// Yazar Admin End
    ////#################################################################################################
    //                                    Admins End

});

//Home
//  HomeKonferansController
Route::get('/konferanslar', [HomeKonferansController::class, 'index'])->name('konferanslar.index');
Route::get('/konferanslar/show/{konferans}', [HomeKonferansController::class, 'show'])->name('konferanslar.show');




Route::get('/iletisim', function () {
    return view('iletisim');
})->name('iletisim');
