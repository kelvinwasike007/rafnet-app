<?php
use Spatie\Permission\Models\Role;
use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\User;
new 
#[Layout('layouts.app')]
class extends Component{
    use WithFileUploads;
    public $name, $email, $password, $role, $roles;

    public function boot()  {
        $this->roles = Role::all();
    }
    
    public function save() {
        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = $this->password;
        $user->save();
        $user->assignRole($this->role);

        return redirect(route('accounts.add'));
    }
}

?>
<div data-theme="light">

    @livewire('pages.accounts.nav')
   <div class="card-title py-4">
    Add Account
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
            <input wire:model="email" type="email" class="input w-full input-primary" placeholder="Email"/>
        </div>
        <div>
            <label for="">Password</label>
            <input wire:model="password" type="password" class="input w-full input-primary" placeholder="Password"/>
        </div>

        <div>
            <label for="">Choose User Role</label>
            <select wire:model="role"  name="" class="select select-primary w-full" id="">
                <option value="" selected>Choose Role</option>
                @foreach ($roles as $role)
                    <option value="{{$role->name}}">{{$role->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button wire:click="save" class="btn btn-primary">Create Account</button>
        </div>

    </div>
    
</div>