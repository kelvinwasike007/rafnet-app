<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use Livewire\WithPagination;
use App\Models\User;
new 
#[Layout('layouts.app')]
class extends Component{

    use WithPagination;

    public function with() {
        return ['users' =>  User::paginate(10)];
    }

    public function delete($id)  {
        User::where('id',$id)->delete();
        return redirect()->route('accounts.index');
    }

    public function edit($id)  {
        return redirect()->route('accounts.edit', ['id' => $id]);
    }
}

?>

<div>

    <div data-theme='light'>
        <livewire:pages.accounts.nav />
        <div class="card-title py-4">
            List Of Accounts
        </div>
        <table class="table table-stripped">
            <thead>
                <th>USERNAME</th>
                <th>EMAIL</th>
                <th>ROLE</th>
                <th>OPERATIONS</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name}}</td>
                        <td>{{ $user->email }}</details></td>
                        <td>{{$user->getRoleNames()}}</td>
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
