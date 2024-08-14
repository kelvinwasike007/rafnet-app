<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use Livewire\WithPagination;
use App\Models\Services;
new 
#[Layout('layouts.app')]
class extends Component{

    use WithPagination;

    public function with() {
        return ['services' =>  Services::paginate(10)];
    }

    public function delete($id)  {
        Services::where('id',$id)->delete();
        return redirect()->route('services.index');
    }

    public function edit($id)  {
        return redirect()->route('services.edit', ['id' => $id]);
    }
}

?>

<div>

    <div data-theme='light'>
        <livewire:pages.services.nav />
        <div class="card-title py-4">
            List Of Products
        </div>
        <table class="table table-stripped">
            <thead>
                <th>NAME</th>
                <th>DESCRIPTION</th>
                <th>PRICE</th>
                <th>OPERATIONS</th>
            </thead>
            <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td>{{ $service->name}}</td>
                        <td><details><summary>View Info</summary>{{ $service->description }}</details></td>
                        <td>{{$service->amount}}</td>
                        <td class="flex space-x-2">
                            <button wire:click="delete({{$service->id}})"  wire:confirm="Are you sure you want to delete this post?" class="btn btn-error btn-xs">DELETE</button>
                            <button wire:click="edit({{$service->id}})" class="btn btn-info btn-xs" wire:navigate>EDIT</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <td>{{ $services->links() }}</td>
            </tfoot>
        </table>
    </div>
    
</div>
