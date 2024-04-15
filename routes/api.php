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
Route::post('/list', [ProductController::class, 'list']);
Route::get('/list', [ProductController::class, 'list']);

Route::delete('delete/{id}', [ProductController::class, 'delete']);
Route::get('product/{id}', [ProductController::class, 'getProduct']);


// api.php
Route::put('update/{id}', [ProductController::class, 'update']);
Route::get('search/{key}', [ProductController::class, 'search']);


?>