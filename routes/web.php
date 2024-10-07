<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\AssignController;
use App\Http\Controllers\CallingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CampeignController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::group(['middleware' => ['role:admin|user|staff|Manager']], function() {
    
    //to permissions
    Route::resource('permissions', App\Http\Controllers\CrudPermissionController::class);  //controller is connected with the route
    Route::get('permissions/{permissionId}/delete', [App\Http\Controllers\CrudPermissionController::class, 'destroy']);


    //to roles
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::get('roles/{roleId}/delete', [App\Http\Controllers\RoleController::class, 'destroy']);
    Route::get('roles/{roleID}/give-permissions',[App\Http\Controllers\RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleID}/give-permissions',[App\Http\Controllers\RoleController::class, 'givePermissionToRole']);


    //to users
    Route::resource('users', UserController::class);
    Route::get('users/{userId}/delete', [UserController::class, 'destroy']);

    // Route::get('users/{user}/skills', [UserController::class, 'manageSkills'])->name('users.skills');


    //
    
    Route::resource('callingSystem', App\Http\Controllers\CallingController::class);

    

    // Route::resource('tickets', App\Http\Controllers\TicketsController::class);

    // Route::resource('orders', App\Http\Controllers\OrdersController::class);


    Route::resource('setting', App\Http\Controllers\SkillController::class);
    Route::resource('assign', App\Http\Controllers\AssignController::class);


    Route::resource('campeign', App\Http\Controllers\CampeignController::class);
    // Route::get('/campeign', [CampeignController::class, 'index'])->name('campeign.index');
    // Route::get('/campeign/create', [CampeignController::class, 'create'])->name('campeign.create');
    // Route::post('/campeign', [CampeignController::class, 'store'])->name('campeign.store');
    // Route::delete('/campeign/{id}', [CampeignController::class, 'destroy'])->name('campeign.destroy');
    // Route::get('/campeign/{id}/edit', [CampeignController::class, 'edit'])->name('campeign.edit');


});







Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
