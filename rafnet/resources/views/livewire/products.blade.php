<?php
use function Livewire\Volt\layout;

layout('layouts.app')
?>
<div>
    <x-slot name="header">
        <div class="dark:text-white font-bold text-lg">
            <h1>Products</h1>
        </div>
    </x-slot>
    <div class="px-12">
        <button wire:click="switch('index')" class="btn btn-info">Product List</button>
        <button wire:click="switch('add')" class="btn btn-primary">Create Product</button>
        {{ $slot }}
    </div>
</div>