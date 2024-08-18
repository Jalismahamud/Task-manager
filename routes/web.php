<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

Route::get('/',function(){
    return redirect('/tasks');
});
Route::resource('/tasks',TasksController::class);
