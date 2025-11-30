<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Pest\Support\View;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::latest()->get();
        return view('order', compact('orders'));
    }

    public function indexJson()
    {
        return response()->json([
            'orders' => Order::latest()->get()
        ]);
    }

    public function data()
    {
        $orders = Order::latest()->get();

        return response()->json([
            'orders' => $orders->map(function ($order) {
                return [
                    'id'              => $order->id,
                    'full_name'       => $order->full_name,
                    'phone_number'    => $order->phone_number,
                    'address'         => $order->address,
                    'product'         => $order->product,
                    'quantity'        => $order->quantity,
                    'notes'           => $order->notes,
                    'payment_method'  => $order->payment_method,
                    'delivery_method' => $order->delivery_method,
                ];
            })
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name'       => 'required|string|max:255',
            'phone_number'    => 'required|string|max:20',
            'address'         => 'required|string',
            'product'         => 'required|string',
            'quantity'        => 'required|integer|min:1',
            'notes'           => 'nullable|string',
            'payment_method'  => 'required|string',
            'delivery_method' => 'required|string',
        ]);

        $order = Order::create($validated); 

        return response()->json([
            'success' => true,
            'message' => 'Pesanan berhasil!',
            'order'   => [
                'id'             => $order->id,
                'full_name'      => $order->full_name,
                'phone_number'   => $order->phone_number,
                'address'        => $order->address,
                'product'        => $order->product,
                'quantity'       => $order->quantity,
                'notes'          => $order->notes,
                'payment_method' => $order->payment_method,
                'delivery_method'=> $order->delivery_method,
                'total_price'    => 35000 * $order->quantity,
            ]
        ]);
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);

        return response()->json([
            'id'              => $order->id,
            'full_name'       => $order->full_name,
            'phone_number'    => $order->phone_number,
            'address'         => $order->address,
            'product'         => $order->product,
            'quantity'        => $order->quantity,
            'notes'           => $order->notes,
            'payment_method'  => $order->payment_method,
            'delivery_method' => $order->delivery_method,
        ]);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $validated = $request->validate([
            'full_name'       => 'required|string|max:255',
            'phone_number'    => 'required|string|max:20',
            'address'        => 'required|string',
            'product'        => 'required|string',
            'quantity'       => 'required|integer|min:1',
            'notes'          => 'nullable|string',
            'payment_method'  => 'required|string',
            'delivery_method' => 'required|string',
        ]);

        $order->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Pesanan berhasil diperbarui!',
            'order' => $order->fresh()
        ]);
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pesanan berhasil dihapus!'
        ]);
    }
}