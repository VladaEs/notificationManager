<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RedisController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MailController;

Route::get('/', function () {
    return view('index');
})->name('mainPage');

Route::get('/redis', [RedisController::class, 'index']);
Route::get('/roles', [RolesController::class, "index"]);

Route::middleware('auth')->group(function () {
    
    Route::get('/createCompany', [CompanyController::class, 'createCompany'])->name("newCompany");
    Route::post('/createCompany', [CompanyController::class, 'StoreNewCompany'])->name("CreateNewCompany");
    //Route::post('/api/newevent', [Eventcontroller::class, 'storeEvent'])->name('storeEvent');
    //Route::get('/api/displayEvent', [Eventcontroller::class, 'showEvent'])->name('showEvent');


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/post/{id}', [DashboardController::class, 'read'])->name('eventPost');
});




Route::middleware(['isAdmin'])->group(function(){
    Route::post('/sendnewemailsnotification', [MailController::class, 'sendNewMessagesNotificationEmail'] )->name('newEmails');
    Route::get('/testAdmin', function(){
        return response("test");

    });
    Route::get('/users', [DashboardController::class, 'showUsers'])->name('users');
});

Route::get('/products', [DashboardController::class, 'index'])->name('products');



// Route::middleware(['auth', 'verified'])->group(function(){
    
// });

    


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




