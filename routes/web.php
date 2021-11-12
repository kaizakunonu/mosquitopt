<?php


use App\Http\Controllers\ConsentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DBExportController;
use App\Http\Controllers\EDController;
use App\Http\Controllers\SSController;
use App\Http\Controllers\UploadFileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->middleware(['auth'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| User Controller
|--------------------------------------------------------------------------
|
| All routes relating  to user
|
*/
Route::get('/user', [UserController::class, 'index']);



/*
|--------------------------------------------------------------------------
| Guest routes
|--------------------------------------------------------------------------
|
| All routes relating  to guest
|
*/
Route::view('/newbie', 'auth.verify-email');

/*
|--------------------------------------------------------------------------
| Consent resource
|--------------------------------------------------------------------------
|
| All routes relating  to consent resource
|
*/

Route::resource('ics', ConsentController::class);


/*
|--------------------------------------------------------------------------
| Project resource
|--------------------------------------------------------------------------
|
| All routes relating  to project resource
|
*/

Route::resource('projects', ProjectController::class);

/*
|--------------------------------------------------------------------------
| ED resource
|--------------------------------------------------------------------------
|
| All routes relating  to ED resource
|
*/

Route::resource('eds', EDController::class);


/*
|--------------------------------------------------------------------------
| SS resource
|--------------------------------------------------------------------------
|
| All routes relating  to SS resource
|
*/

Route::resource('sss', SSController::class);


// export informed consent fields for data entry
Route::post('/ics/export/', [ConsentController::class, 'export'])->name('export_ics');


// export experimental design fields for data entry
Route::post('/eds/export/', [EDController::class, 'export'])->name('export_eds');

// export sample sorting columns for data entry
Route::post('/sss/export/', [SSController::class, 'export'])->name('export_sss');

// import experimental design data
Route::post('/ic/import', [ConsentController::class, 'import'])->name('ic_import');

// import experimental design data
Route::post('/ed/import', [EDController::class, 'import'])->name('ed_import');

// import sample sorting data
Route::post('/sss/import', [SSController::class, 'import'])->name('ss_import');

// get IC upload form
Route::get('/uploadicfile',[UploadFileController::class, 'getIcUploadForm'])->name('gic_upload');

// get ED upload form
Route::get('/uploadedfile',[UploadFileController::class, 'getEdUploadForm'])->name('ged_upload');

// get SS upload form
Route::get('/uploadssfile',[UploadFileController::class, 'getSsUploadForm'])->name('gss_upload');

// POST data in the submitted ED file
Route::post('/uploadedfile',[UploadFileController::class, 'showUploadFile'])->name('ped_upload');


// POST data in the submitted SS file
Route::post('/uploadssfile',[UploadFileController::class, 'showUploadFile'])->name('pss_upload');

/*
|--------------------------------------------------------------------------
| EDsDB Controller
|--------------------------------------------------------------------------
|
| All routes relating  to ED Database export
|
*/
//Route::get('/edsdb/export', EDsDBExportController::class)->name('edsdbexport');

/*
|--------------------------------------------------------------------------
| SSsDB Controller
|--------------------------------------------------------------------------
|
| All routes relating  to SS Database export
|
*
Route::get('/sssdb/export', SSsDBExportController::class)->name('sssdbexport');


Route::get('select ED attributes', [DBExportController::class, 'eddbexportview'])->name('eddbexport');
Route::get('select SS attributes', [DBExportController::class, 'ssdbexportview'])->name('ssdbexport');*/

Route::get('/icexport', [DBExportController::class, 'exportIcData'])->name('icexport');
Route::get('/edexport', [DBExportController::class, 'exportEdData'])->name('edexport');
Route::get('/ssexport', [DBExportController::class, 'exportSsData'])->name('ssexport');




require __DIR__.'/auth.php';
