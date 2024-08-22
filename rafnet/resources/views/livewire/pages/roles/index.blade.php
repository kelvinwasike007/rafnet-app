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

    public $role;

    public function with() {
        return ['roles' =>  Role::paginate(10)];
    }

    public function delete($id)  {
        User::where('id',$id)->delete();
        return redirect()->route('accounts.index');
    }

    public function edit($id)  {
        return redirect()->route('accounts.role.edit', ['id' => $id]);
    }

    public function addRole()  {
        Role::create(['name'=> $this->role]);
        return redirect()->route('accounts.role');
    }
}

?>

<div>

    <div data-theme='light'>
        <livewire:pages.accounts.nav />
        <div class="space-y-2">
            <div class="card-title py-4">
                Create Role
            </div>
            <div>
                <label for="">Role Name</label>
                <input type="text" class="input input-primary w-full" placeholder="Enter Role Name" wire:model="role">
            </div>
           <div>
            <button wire:click="addRole" class="btn-primary btn btn-sm">Add Role</button>
           </div>
        </div>
        <div class="card-title py-4">
            List Of Roles
        </div>
        <table class="table table-stripped">
            <thead>
                <th>Role</th>
                <th>Permissions</th>
                <th>OPERATIONS</th>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->name}}</td>
                        <td>@foreach ($role->permissions as $item)
                            {{$item->name}}
                        @endforeach</td>
                        <td class="flex space-x-2">
                            <button wire:click="delete({{$role->id}})"  wire:confirm="Are you sure you want to delete this post?" class="btn btn-error btn-xs">DELETE</button>
                            <button wire:click="edit({{$role->id}})" class="btn btn-info btn-xs" wire:navigate>EDIT</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <td>{{ $roles->links() }}</td>
            </tfoot>
        </table>
    </div>
    
</div>
