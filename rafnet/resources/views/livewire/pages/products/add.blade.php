<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\Products;
new 
#[Layout('layouts.app')]
class extends Component{
    use WithFileUploads;
    public $name, $sku, $description, $images=[], $amount, $imgs=[];
    
    public function save() {
        $product = new Products();
        $product->name = $this->name;
        $product->description = $this->description;
        $product->price = $this->amount;
        $product->sku = $this->sku;

        foreach ($this->images as $image) {
            $file = $image->store(path:'public/products/uploads');
            array_push($this->imgs, $file);
        }

        $product->images = json_encode($this->imgs);

        $product->save();

        return redirect(route('products.add'));
    }
}

?>
<div data-theme="light">

    @livewire('pages.products.nav')
   <div class="card-title py-4">
    Add Product
   </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="flex flex-col space-y-2">
        <div><input wire:model="name" class="input w-full input-primary" placeholder="Name"/></div>
        <div class="w-full">
            <label for="">Description</label>
            <textarea wire:model="description" rows="6" class="textarea textarea-bordered textarea-primary textarea-lg w-full" name="description" placeholder="Description"></textarea>
        </div>
        <div>
            <label for="imgs">Choose Images</label>
            <input type="file" accept="image/*" wire:model="images" id="imgs" multiple name="images[]" placeholder="Upload Images" class="file-input input-primary w-full">
        </div>
        <div>
            <label for="">SKU (Serial Keeping Unit)</label>
            <input placeholder="SKU" wire:model="sku" type="text" class="input w-full input-primary">
        </div>

        <div>
            <label for="amount">Amount</label>
            <input placeholder="Price" wire:model="amount" type="number" class="input w-full input-primary">
        </div>
        <div>
            <button wire:click="save" class="btn btn-primary">Save Product</button>
        </div>

    </div>
    
</div>