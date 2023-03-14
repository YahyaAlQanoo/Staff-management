<?php

use App\Http\Controllers\ChatsController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\DepartmentsUsersController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\HumanResourcesController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\MeatingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WorksController;
use App\Http\Middleware\check_that_hr;
use App\Http\Middleware\check_user_type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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




// Route::view('/index', 'index')->name('index')->middleware('auth');
Route::get('/index', function () {

    $department = DB::table('departments')
        ->select('name')
        ->where('id', '=', Auth::user()->department_id)->first();

    return view('index', [
        'department' => $department,
        'user' => Auth::user()
    ]);
})->name('index')->middleware('auth');


//Employees
Route::get('employee/insert', [EmployeesController::class, 'insert_serves'])->name('insert_serves')->middleware('auth');
Route::post('employee/store', [EmployeesController::class, 'store_serves'])->name('store_serves')->middleware('auth');
Route::get('employee/show_serves/{id}', [EmployeesController::class, 'show_serves'])->name('show_serves')->middleware('auth');

Route::get('/show', [MeatingController::class, 'show_meating'])->name('meating.show')->middleware('auth');


Route::get('/create_chat', [ChatsController::class, 'create'])->name('create_chat')->middleware('auth');
Route::post('/create_chat', [ChatsController::class, 'store'])->name('store_chat')->middleware('auth');
Route::get('/chats', [ChatsController::class, 'index'])->name('chats')->middleware('auth');
Route::get('/chats/{id}/show', [ChatsController::class, 'show'])->name('chat_show')->middleware('auth');
Route::get('/chats/{id}/download', [ChatsController::class, 'download'])->name('chat_download')->middleware('auth');





// HR
Route::middleware('auth', check_that_hr::class)->group(function () {

    Route::get('human_resources/human_orders/{id}', [HumanResourcesController::class, 'show_orders'])->name('human_re');
    Route::put('passing_orders/{id}', [HumanResourcesController::class, 'passing_orders'])->name('passing_orders');
    Route::get('human_resources/insert', [HumanResourcesController::class, 'insert_serves'])->name('human_resources_insert_serves');
    Route::post('human_resources/store', [HumanResourcesController::class, 'store_serves'])->name('human_resources_store_serves');
    Route::get('human_resources/show_serves/{id}', [HumanResourcesController::class, 'show_serves'])->name('human_resources_show_serves');
});

// Manager
Route::middleware('auth', check_user_type::class)->group(function () {
    Route::get('manager/show_orders', [ManagerController::class, 'show_orders'])->name('show_orders');
    Route::get('manager/add_response/{id}', [ManagerController::class, 'add_response'])->name('add_response');
    Route::put('manager/store_response/{id}', [ManagerController::class, 'store_response'])->name('store_response');

    Route::get('manager/insert_users', [ManagerController::class, 'insert_users'])->name('insert_users');
    Route::post('manager/store_users', [ManagerController::class, 'store_users'])->name('store_users');
    Route::get('manager/show_users', [ManagerController::class, 'show_users'])->name('show_users');

    Route::get('manager/insert_departments', [ManagerController::class, 'insert_departments'])->name('insert_departments');
    Route::post('manager/store_departments', [ManagerController::class, 'store_departments'])->name('store_departments');


    Route::get('manager/show_departments', [ManagerController::class, 'show_departments'])->name('show_departments')->withoutMiddleware(check_user_type::class);
    Route::get('manager/departments_user/{id}', [ManagerController::class, 'departments_user'])->name('departments_user')->withoutMiddleware(check_user_type::class);
    Route::get('/manager/{id}/show/user_profile', [ManagerController::class, 'user_profile'])->name('manager_show_user_profile')->middleware('auth')->withoutMiddleware(check_user_type::class);




    Route::get('/create', [MeatingController::class, 'create_meating'])->name('meating.create');
    Route::post('/create', [MeatingController::class, 'store_meating'])->name('meating.store');

});


Route::middleware('auth')->group(function () {
    Route::get('/create_works', [WorksController::class, 'create_works'])->name('works.create');
    Route::get('/show_works', [WorksController::class, 'show_works'])->name('works.show');
    Route::post('/store_works', [WorksController::class, 'store_works'])->name('works.store');
    Route::get('/worksesn/{id}/downloaded', [WorksController::class, 'download'])->name('works.download') ;


    Route::get('/edit-profile/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/edit-profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
});





require __DIR__ . '/auth.php';
