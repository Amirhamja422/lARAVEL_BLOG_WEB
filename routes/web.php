<?php

use App\Http\Controllers\APP\DashboardapiController;
use PhpParser\Node\Stmt\Catch_;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CrmController;
// use Illuminate\Http\JsonResponse;
use App\Http\Controllers\CustomAuthCotroller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ImageCrudController;
use App\Http\Controllers\inboundController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\ScategoryController;

## component base route task start

## component base route task end


## Category controllers route
Route::get('/', [CategoryController::class,'index'])->name('index');
Route::get('test', [CategoryController::class, 'tests'])->name('admin.category');
Route::get('create', [CategoryController::class, 'create'])->name('cat.category');
Route::post('store', [CategoryController::class, 'store'])->name('class.store');
Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('class.delete');
Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('class.edit');
Route::put('update/{id}', [CategoryController::class, 'update'])->name('class.update');


## Resource route
Route::resource('categories',ScategoryController::class);

##user
Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::get('profile_view', [ProfileController::class, 'profileView'])->name('profile.view');
Route::POST('delete', [ProfileController::class,'deleteUser'])->name('profile.delete');
Route::POST('pro', [ProfileController::class, 'createUser'])->name('profile.create');
Route::POST('deactive', [ProfileController::class, 'userDeactive'])->name('profile.deactive');
Route::POST('active', [ProfileController::class, 'userActive'])->name('profile.active');


## phones
Route::get('phone', [PhoneController::class, 'phoneView'])->name('admin.phone');
Route::get('phone-active', [PhoneController::class, 'phoneActive'])->name('phone.active');

##crm
Route::get('crm',[CrmController::class,'crmView'])->name('admin.crm');
Route::get('crm-download/{start_date}/{end_date}', [CrmController::class, 'crmDataDownload'])->name('crm.download');


## login and register users web route
Route::get('login', [CustomAuthCotroller::class, 'login'])->name('login');
Route::get('register', [CustomAuthCotroller::class, 'registration'])->name('register');
Route::post('regCreate', [CustomAuthCotroller::class, 'regCreate'])->name('register.create');
Route::post('login-user', [CustomAuthCotroller::class, 'loginUser'])->name('login-user');

## Dashboard web routes
Route::get('dashboard',[DashboardController::class,'dashboardView'])->name('dashboard');


##user download
Route::get('user',[CrmController::class,'userView'])->name('admin.user');
Route::get('user-download', [CrmController::class, 'exportExcelFile'])->name('user.export');


##inbound report
Route::get('inbound',[inboundController::class,'inbound'])->name('admin.inbound');


##csv upload
Route::get('csv-view',[CrmController::class,'fileView'])->name('admin.crmupload');
Route::POST('csv-upload',[CrmController::class,'csvUpload'])->name('admin.csvupload');


## image upload
Route::get('admin-logo',[ImageCrudController::class,'imgView'])->name('admin.adminlogo');
Route::POST('img-upload',[ImageCrudController::class,'imgUpload'])->name('admin.fileUpload');

##Email Integration
Route::get('email',[EmailController::class,'emailView'])->name('admin');
Route::POST('email-send',[EmailController::class,'emailSend'])->name('admin.email');




## logout form
Route::get('/logout', [CustomAuthCotroller::class, 'logout']);


## Clear application cache:
Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:cache');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return 'Application cache has been cleared';
});
