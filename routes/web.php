<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;

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

// Route::get('/', [ListingController::class, 'all']);

// Route::get('/', function () {
//     // return view('welcome');
//     // $users = DB::table('users')->get();
//     // dd($users);
//     return view('listings', ["heading"=>"one",
//                              "listings"=>[
//                                 "title"=>"TestTitle",
//                                 "description"=>"TestDescription"]]);
// });

Route::get('/', function(){
    return view('welcome');
});

Route::resource('/listing' ,ListingController::class);

Route::get('/test', function() {
    // return view('testlistings');
    return Response('<h1>Testing the routing</h1>', 200);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
