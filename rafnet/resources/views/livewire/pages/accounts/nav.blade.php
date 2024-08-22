
<div>
    <x-slot name="header">
        <div class="card-title text-black">
            Accounts
        </div>
        <div class="tablist ">
            <a role="tab" class="tab text-black" href="{{route('accounts.index')}}" wire:navigate>List Account</a>
            <a wire:navigate role="tab" class="tab text-black tab-active" active href="{{route('accounts.add')}}" >Add Account</a>
            <a wire:navigate role="tab" class="tab text-black tab-active" active href="{{route('accounts.permission')}}" >Manage Permissions</a>
            <a wire:navigate role="tab" class="tab text-black tab-active" active href="{{route('accounts.role')}}" >Manage Roles</a>
        </div>
    </x-slot>
</div>