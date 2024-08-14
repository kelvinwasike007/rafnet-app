
<div>
    <x-slot name="header">
        <div class="card-title text-black">
            Products
        </div>
        <div class="tablist ">
            <a role="tab" class="tab text-black" href="{{route('products.index')}}" wire:navigate>List Products</a>
            <a role="tab" class="tab text-black tab-active" active href="{{route('products.add')}}" >Add Products</a>
        </div>
    </x-slot>
</div>