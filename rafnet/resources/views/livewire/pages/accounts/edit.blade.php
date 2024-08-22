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

    public $roles;
    
    public $name, $email, $role, $user;

    public function boot()  {
        $user = User::where('id', $this->id)->first();
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->roles = Role::all();
    }
    
    public function save() {
        $user = User::find($this->id);
        $user->name = $this->name;
        $user->email = $this->email;
        $role = Role::where('name', $this->role)->first();
        $user->syncRoles($role);

        $user->save();

        return redirect(route('accounts.index'));
    }
}

?>
<div data-theme="light">

    @livewire('pages.accounts.nav')
   <div class="card-title py-4">
    Edit Account [{{$name}}] 
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
            <label for="">Email</label>
            <input type="email" class="input w-full input-primary" wire:model="email" />
        </div>
        <div>
            <label for="">Role</label>
            <select wire:model="role"  name="" class="select select-primary w-full" id="">
                <option value="" selected>Choose Role</option>
                @foreach ($roles as $role)
                    <option value="{{$role->name}}">{{$role->name}}</option>
                @endforeach
            </select>
        </div>


        
        <div>
            <button wire:click="save" class="btn btn-primary">Update Account</button>
        </div>

    </div>
    
</div>