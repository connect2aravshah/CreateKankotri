<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScrapeController;
use App\Http\Controllers\RsvpController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/templates', [TemplateController::class, 'index']);
Route::get('/templates/{id}', [TemplateController::class, 'show'])->name('templates.show');
Route::post('/templates/{id}/rsvp', [RsvpController::class, 'store'])->name('templates.rsvp');

Route::post('/scrape', [ScrapeController::class, 'run'])->name('scrape.run');

Route::get('/admin/templates', [AdminController::class, 'templates'])->name('admin.templates');
