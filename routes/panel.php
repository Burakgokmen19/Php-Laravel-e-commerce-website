<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\DashBoardConroller;
route::group(['middleware'=>['panelsetting'],'prefix'=>'panel','as'=>'panel.'],function(){

    Route::get('/',[DashBoardConroller::class,'index'])->name('index');
    Route::get('/slider',[SliderController::class,'index'])->name('slider.index');
    Route::get('/slider/add', [SliderController::class, 'create'])->name('slider.create');
    Route::post('/slider/store',[SliderController::class,'store'])->name('slider.store');
    Route::get('/slider/{id}/edit', [SliderController::class, 'edit'])->name('slider.edit');
    Route::put('/slider/{id}/update',[SliderController::class,'update'])->name('slider.update');
    Route::delete('/slider/{id}/destroy',[SliderController::class,'destroy'])->name('slider.destroy');
    Route::post('/slider-status/update',[SliderController::class,'status'])->name('slider.status');
});
