<?php

use App\Livewire\Dashboard\Employee\EmployeeForm;
use App\Livewire\Dashboard\Employee\EmployeeShow;
use App\Livewire\Dashboard\Service\ServiceShow;
use App\Livewire\Dashboard\User\Profile;
use App\Livewire\Dashboard\Vehicle\VehicleForm;
use App\Livewire\Dashboard\Vehicle\VehicleShow;
use App\Livewire\SignIn;
use App\Models\Employee;
use Illuminate\Support\Facades\Route;

Route::get('/', SignIn::class)->name('home');


Route::middleware('auth')->group(function(){
    Route::prefix('/dashboard')->group(function(){
        Route::get('/profile', Profile::class)->name('profile');
        Route::get('/vehicle/show',VehicleShow::class)->name('vehicle.show');
        Route::get('/vehicle/form',VehicleForm::class)->name('vehicle.form');
        Route::get('/vehicle/edit/{id}', VehicleForm::class)->name('vehicle.edit');
        Route::get('/employee/form', EmployeeForm::class)->name('employee.form');
        Route::get('/employee/show', EmployeeShow::class)->name('employee.show');
        Route::get('/services/show', ServiceShow::class)->name('services.show');
    });
    Route::get('/logout', function(){
        auth()->logout();
        return redirect(route('home'));
    })->name('logout');
});
