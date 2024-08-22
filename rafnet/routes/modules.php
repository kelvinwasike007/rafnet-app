<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;


Route::prefix('products')->group(function ()  {
    Volt::route('/', 'pages.products.index')->name('products.index');
    Volt::route('/add', 'pages.products.add')->name('products.add');
    Volt::route('/edit', 'pages.products.edit')->name('products.edit');
    Volt::route('/inventory', 'pages.products.inventory')->name('products.inventory');
})->name('products');

Route::prefix('services')->group(function ()  {
    Volt::route('/', 'pages.services.index')->name('services.index');
    Volt::route('/add', 'pages.services.add')->name('services.add');
    Volt::route('/edit', 'pages.services.edit')->name('services.edit');
    Volt::route('/inventory', 'pages.services.inventory')->name('services.inventory');
})->name('services');

Route::prefix('accounts')->group(function ()  {
    Volt::route('/', 'pages.accounts.index')->name('accounts.index');
    Volt::route('/role', 'pages.roles.index')->name('accounts.role');
    Volt::route('/role/edit', 'pages.roles.edit')->name('accounts.role.edit');
    Volt::route('/permission', 'pages.permissions.index')->name('accounts.permission');
    Volt::route('/add', 'pages.accounts.add')->name('accounts.add');
    Volt::route('/edit', 'pages.accounts.edit')->name('accounts.edit');
    Volt::route('/inventory', 'pages.accounts.inventory')->name('accounts.inventory');
})->name('accounts');

Route::prefix('orders')->group(function ()  {
    Volt::route('/', 'pages.orders.index')->name('orders.index');
})->name('accounts');