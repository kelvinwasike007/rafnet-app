<?php 

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = $request->user()->orders()->with('orderable')->get();
        return response()->json($orders);
    }

    public function store(Request $request)
    {
        $request->validate([
            'orderable_id' => 'required|integer',
            'orderable_type' => 'required|string',
            'quantity' => 'required|integer|min:1',
        ]);

        $order = $request->user()->orders()->create([
            'orderable_id' => $request->orderable_id,
            'orderable_type' => $request->orderable_type,
            'quantity' => $request->quantity,
            'total_price' => $request->quantity * $request->orderable()->price, // Assumes you have price on the orderable models
        ]);

        return response()->json($order, 201);
    }
}

?>