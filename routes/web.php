<?php

use App\Http\Controllers\AuthController;
use App\Models\Department;
use Illuminate\Support\Facades\Route;

// ----- Guests -----
Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome', [
            'departments' => Department::orderBy('name')->get(),
        ]);
    });

    // Laravel sends logged-out visitors to a route named "login",
    // so point it at the home page where the login form lives.
    Route::get('/login', fn () => redirect('/'))->name('login');

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

// ----- Logged in -----
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Sends each person to the right page
    Route::get('/dashboard', function () {
        $user = auth()->user();

        return match (true) {
            $user->isAdmin() => redirect('/admin'),
            $user->isStaff() => redirect('/staff'),
            default          => redirect('/student'),
        };
    })->name('dashboard');

    Route::get('/student', fn () => view('student'))->name('student.home');
    Route::get('/staff', fn () => 'Staff page coming soon')->name('staff.home');
    Route::get('/admin', fn () => 'Admin page coming soon')->name('admin.home');
});