<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Attributes\Url;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\Services;
new 
#[Layout('layouts.app')]
class extends Component{
    use WithFileUploads;

    #[Url]
    public $id = '';
    
    public $name, $sku, $description, $images=[], $amount, $imgs=[];

    public function boot()  {
        $service = Services::where('id', $this->id)->first();
        $this->name = $service->name;
        $this->description = $service->description;
        $this->amount = $service->amount;

    }
    
    public function save() {
        $service = Services::find($this->id);
        $service->name = $this->name;
        $service->description = $this->description;
        $service->amount = $this->amount;

        $service->save();

        return redirect(route('services.index'));
    }
}

?>
<div data-theme="light">

    @livewire('pages.services.nav')
   <div class="card-title py-4">
    Edit Product 
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
            <label for="amount">Amount</label>
            <input placeholder="Price" wire:model="amount" type="number" class="input w-full input-primary">
        </div>
        <div>
            <button wire:click="save" class="btn btn-primary">Save Product</button>
        </div>

    </div>
    
</div>