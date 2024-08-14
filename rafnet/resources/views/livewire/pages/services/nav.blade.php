
<div>
    <x-slot name="header">
        <div class="card-title text-black">
            Services
        </div>
        <div class="tablist ">
            <a role="tab" class="tab text-black" href="{{route('services.index')}}" wire:navigate>List Services</a>
            <a role="tab" class="tab text-black tab-active" active href="{{route('services.add')}}" >Add Services</a>
        </div>
    </x-slot>
</div>