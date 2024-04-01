<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\VisitorController;
use App\Http\Controllers\Admin\ContactControlller;


//get visitor
Route::get('/getVisitor', [VisitorController::class, 'GetVisitorDetails']);
//contact page router

Route::post('/postcontact', [ContactControlller::class, 'PostContactDetails']);