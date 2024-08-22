<?php

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Livewire\Attributes\{Layout, Title};
use Livewire\Attributes\Url;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\User;
new 
#[Layout('layouts.app')]
class extends Component{
    use WithFileUploads;

    #[Url]
    public $id = '';

    
    public $name,$updateTypes=[], $permissions, $role;

    public function boot()  {
        $role = Role::find($this->id)->first();
        $this->role = $role;
        $this->permissions = Permission::all();
        $this->name = $role->name;
    }
    
    public function save() {
        $role = Role::find($this->id)->first();
        $role->name = $this->name;
        $role->save();
        $role->syncPermissions($this->updateTypes);
        return redirect()->route('accounts.role');
    }
}

?>
<div data-theme="light">

    @livewire('pages.accounts.nav')
   <div class="card-title py-4">
    Edit Role [{{$name}}] 
   </div>
   <div class="card py-4">
    <div class="font-medium">Active Permissions</div>
    @foreach ($role->permissions as $item)
        {{$item->name}}
    @endforeach
</div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="flex flex-col space-y-2">
        <div>
            <label for="">Username</label>
            <input wire:model="name" class="input w-full input-primary" placeholder="Name"/>
        </div>

        <div>
            
            <label for="">Permissions</label>
            <div class="flex flex-col">
                @foreach ($permissions as $perm)
                <div class="form-control">
                    <label class="cursor-pointer label">
                      <span class="label-text">{{$perm->name}}</span>
                      <input wire:model="updateTypes" type="checkbox" value={{$perm->name}} type=""   />
                    </label>
                  </div>
                @endforeach
            </div>
        </div>


        
        <div>
            <button wire:click="save" class="btn btn-primary">Update Account</button>
        </div>

    </div>
    
</div>