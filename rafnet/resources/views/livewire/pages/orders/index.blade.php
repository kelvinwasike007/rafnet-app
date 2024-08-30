<?php
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Orders;
new 
#[Layout('layouts.app')]
class extends Component{

    use WithPagination;

    public function changeStat($order) {
        $id = $order["id"];
        $res = Orders::find($id);
        if($res->status == 'pending'){
            $res->status = 'purchased';
            $res->save();
            Log::info($res->status);
        }else {
            $res->status ='pending';
            $res->save();
            Log::alert($res);
        }
    }
    

    public function with() {
        return ['orders' =>  Orders::paginate(10)];
    }
}

?>

<div>

    <div data-theme='light'>
        <livewire:pages.orders.nav />
        <div class="space-y-2">
            <div class="card-title py-4">
                Orders
            </div>
           <div>
           </div>
        </div>
        <div class="card-title py-4">
            List Of Orders
        </div>
        <table class="table table-stripped">
            <thead>
                <th>ORDER ID</th>
                <th>PRODUCT</th>
                <th>Quantity</th>
                <th>PRICE</th>
                <th>STATUS</th>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{User::find($order->user_id)->orders()->with('orderable')->find($order->id)->orderable->name}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->total_price}}</td>
                        <td><button wire:click="changeStat({{$order}})" class="text-bold btn btn-sm">{{$order->status}}</button></td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <td>{{ $orders->links() }}</td>
            </tfoot>
        </table>
    </div>
    
</div>
