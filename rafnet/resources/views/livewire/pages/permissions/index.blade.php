<?php
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use Livewire\WithPagination;
use App\Models\User;
new 
#[Layout('layouts.app')]
class extends Component{

    use WithPagination;

    public $permission;

    public function with() {
        return ['users' =>  Permission::paginate(10)];
    }

    public function delete($id)  {
        Permission::where('id',$id)->delete();
        return redirect()->route('accounts.permission');
    }

    public function edit($id)  {
        return redirect()->route('accounts.edit', ['id' => $id]);
    }

    public function addPermission()  {
        Permission::create(['name'=> $this->permission]);
        return redirect()->route('accounts.permission');
    }
}

?>

<div>

    <div data-theme='light'>
        <livewire:pages.accounts.nav />
        <div class="space-y-2">
            <div class="card-title py-4">
                Create Permission
            </div>
            <div>
                <label for="">Role Name</label>
                <input type="text" class="input input-primary w-full" placeholder="Enter Premission Name" wire:model="permission">
            </div>
           <div>
            <button wire:click="addPermission" class="btn-primary btn btn-sm">Add Permission</button>
           </div>
        </div>
        <div class="card-title py-4">
            List Of Permissions
        </div>
        <table class="table table-stripped">
            <thead>
                <th>Permissions</th>
                <th>OPERATIONS</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name}}</td>
                        <td class="flex space-x-2">
                            <button wire:click="delete({{$user->id}})"  wire:confirm="Are you sure you want to delete this post?" class="btn btn-error btn-xs">DELETE</button>
                            <button wire:click="edit({{$user->id}})" class="btn btn-info btn-xs" wire:navigate>EDIT</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <td>{{ $users->links() }}</td>
            </tfoot>
        </table>
    </div>
    
</div>
