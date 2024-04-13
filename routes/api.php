<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\VisitorController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ProductController;


//get visitor
Route::get('/getVisitor', [VisitorController::class, 'GetVisitorDetails']);
//contact page router

Route::post('/postcontact', [ContactController::class, 'PostContactDetails']);

Route::post('/addProduct', [ProductController::class, 'addProduct']);
?>