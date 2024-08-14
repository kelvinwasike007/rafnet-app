<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Attributes\Url;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\Products;
new 
#[Layout('layouts.app')]
class extends Component{
    use WithFileUploads;

    #[Url]
    public $id = '', $stock=0, $nstock=0;
    
    public $name, $sku, $description, $images=[], $amount, $imgs=[];

    public function boot()  {
        $product = Products::where('id', $this->id)->first();
        $this->name = $product->name;
        $this->description = $product->description;
        $this->sku = $product->sku;
        $this->amount = $product->price;
        $this->stock = (int)$product->stock_quantity;
        $this->imgs = json_decode($product->images);
    }
    
    public function save() {
        $product = Products::where('id',$this->id)->update(['stock_quantity'=> $this->stock + $this->nstock]);

        return redirect(route('products.index'));
    }

    public function add()  {
        $this->nstock = $this->nstock + 1;
    }

    public function minus()  {
        $this->nstock = $this->nstock - 1;
    }

}


?>
<div data-theme="light">

    @livewire('pages.products.nav')
   <div class="card-title py-4">
    Manage Invetrory For {{$name}} - {{$sku}} 
   </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="flex flex-col space-y-2">
        <p class="font-medium">{{$description}}</p>
        <div>
            <label for="">PREVIEWS</label>
            <div class="flex ">
                @foreach ($imgs as $img)
                    <div><img src="{{ asset(str_replace('public', 'storage', $img))}}" alt="s"></div>
                    
                @endforeach
            </div>
        </div>
        <label for="">Quantity : {{$stock}} Units / Add/Sub : {{$nstock}}</label>
        <div className="join">
            <button wire:click="minus" class="btn btn-primary join-item">-</button>
            <input type="number" wire:model.live="nstock" className="input input-primary input-bordered join-item" placeholder="Stock Quantity" />
            <button wire:click="add" class="btn btn-primary join-item">+</button>
          </div>
        <div>
            <button wire:click="save" class="btn btn-primary">Update inventory</button>
        </div>

    </div>
    
</div>