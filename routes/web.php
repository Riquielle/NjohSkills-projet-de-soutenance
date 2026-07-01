<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\AccueilController;
use App\http\Controllers\LoginController;
use App\http\Controllers\DashboardapController;
use App\http\Controllers\DashboardfoController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ApprenantController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\LeconController;




Route::group(['middleware' => 'auth'],function () {
    Route::get('/dashboard_ap',[DashboardapController::class,'dashboard_ap'])->name('dashboard_ap');
    Route::get('/dashboard_fo',[DashboardfoController::class,'dashboard_fo'])->name('dashboard_fo');
    Route::get('/A_formation',[FormationController::class,'A_formation'])->name('A_formation');
    Route::post('/store',[FormationController::class,'store'])->name('store');
    Route::get('/Mes_formations',
    [FormationController::class,'Mes_formations'])
    ->name('Mes_formations');
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
    Route::put('/formations/{id}', [FormationController::class, 'update'])
    ->name('formations.update');
    Route::delete('/formations/{id}', [FormationController::class, 'destroy'])
    ->name('formations.destroy');

    Route::get('/paiement/{id}', [PaiementController::class, 'paiement'])
        ->name('paiement');

    Route::post('/paiement/{id}', [PaiementController::class, 'store'])
        ->name('paiement.store');

    Route::get('/details_formations/{id}',[DashboardapController::class,'details_formations'])->name('details_formations');
    Route::get('/ma_formation/{id}', [ApprenantController::class, 'ma_Formation'])
    ->name('ma_Formation');

    Route::get('/formations/{formation}/modules',
        [ModuleController::class,'module'])
        ->name('modules');
    
    Route::post('/formations/{formation}/modules', [ModuleController::class, 'store'])
        ->name('modules.store');

    Route::put('/modules/{module}', [ModuleController::class, 'update'])
        ->name('modules.update');

    Route::delete('/modules/{module}', [ModuleController::class, 'destroy'])
        ->name('modules.destroy');
    
    Route::get('/modules/{module}/lecons',
        [LeconController::class,'lecons'])
        ->name('lecons');

    Route::post('/modules/{module}/lecons',
        [LeconController::class,'store'])
        ->name('lecons.store');

    Route::put('/lecons/{lecon}',
        [LeconController::class,'update'])
        ->name('lecons.update');

    Route::delete('/lecons/{lecon}',
        [LeconController::class,'destroy'])
        ->name('lecons.destroy');

    Route::get('/lecons/{lecon}/ressources',
        [RessourceController::class, 'ressources'])
        ->name('ressources');

    Route::post('/lecons/{lecon}/ressources',
        [RessourceController::class, 'store'])
        ->name('ressources.store');

    Route::put('/ressources/{ressource}',
        [RessourceController::class, 'update'])
        ->name('ressources.update');

    Route::delete('/ressources/{ressource}',
        [RessourceController::class, 'destroy'])
        ->name('ressources.destroy');
 });




    Route::get('/',[AccueilController::class,'index'])->name('home');
    Route::get('/about',[AccueilController::class,'about'])->name('about');
    Route::get('/home2',[AccueilController::class,'home2'])->name('home2');
    Route::get('/formations',[AccueilController::class,'formations'])->name('formations');
    
    Route::get('/sign_up/apprenant',[LoginController::class,'sign_upApprenant'])->name('sign_up.apprenant');
    Route::post('/sign_up/processsign_upApprenant',[LoginController::class,'processsign_upApprenant'])->name('processsign_upApprenant');
    Route::post('/sign_up/processsign_upFormateur',[LoginController::class,'processsign_upFormateur'])->name('processsign_upFormateur');
    Route::get('sign_up/formateur', [LoginController::class, 'sign_upFormateur'])
    ->name('sign_up.formateur');
    
    Route::get('/sign_in',[LoginController::class,'sign_in'])->name('sign_in');
    

    Route::post('/authenticate',[LoginController::class,'authenticate'])->name('authenticate');




