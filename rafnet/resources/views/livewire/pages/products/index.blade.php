<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use Livewire\WithPagination;
use App\Models\Products;
new 
#[Layout('layouts.app')]
class extends Component{

    use WithPagination;

    public function with() {
        return ['products' =>  Products::paginate(10)];
    }

    public function delete($id)  {
        Products::where('id',$id)->delete();
        return redirect()->route('products.index');
    }

    public function edit($id)  {
        return redirect()->route('products.edit', ['id' => $id]);
    }

    public function inventory($id)  {
        return redirect()->route('products.inventory', ['id' => $id]);
    }
}

?>

<div>

    <div data-theme='light'>
        <livewire:pages.products.nav />
        <div class="card-title py-4">
            List Of Products
        </div>
        <table class="table table-stripped">
            <thead>
                <th>NAME</th>
                <th>SKU</th>
                <th>DESCRIPTION</th>
                <th>PRICE</th>
                <th>OPERATIONS</th>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name}}</td>
                        <td>{{ $product->sku}}</td>
                        <td><details><summary>View Info</summary>{{ $product->description }}</details></td>
                        <td>{{$product->price}}</td>
                        <td class="flex space-x-2">
                            <button wire:click="delete({{$product->id}})"  wire:confirm="Are you sure you want to delete this post?" class="btn btn-error btn-xs">DELETE</button>
                            <button wire:click="edit({{$product->id}})" class="btn btn-info btn-xs" wire:navigate>EDIT</button>
                            <button wire:click="inventory({{$product->id}})" class="btn btn-warning btn-xs" wire:navigate>MANAGE INVENTORY</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <td>{{ $products->links() }}</td>
            </tfoot>
        </table>
    </div>
    
</div>
