<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Session;

class OrderController extends Controller
{
    public  function placeOrder()
    {
        $cart = session('cart', []);

        if(empty($cart)){
            return redirect()->back()->with('error', 'Your cart is empty!');
        }

        $total = 0;

        foreach($cart as $val){
            $discount = ($val['price']*$val['discount']) / 100;
            $finalPrice = $val['price'] - $discount;
            $subTotal = $finalPrice * $val['qty'];
            $total += $subTotal;
        }
        
        $order = Order::create([
            'userId' => Auth::guard('admin')->id(),
            'total' => $total,
            'status' => 'pending',
            'date' => now()->toDateString(),
        ]);

        foreach($cart as $val){
            $discount = ($val['price'] * $val['discount']) / 100;
            $finalPrice = $val['price'] - $discount;

            OrderItem::create([
                'orderId' => $order->id,
                'productId' =>  $val['id'],
                'name' => $val['name'],
                'qty' => $val['qty'],
                'price' => $finalPrice,
                'discount' => $val['discount'],
            ]);
        }
        
        session()->forget('cart');
        return redirect()->back()->with('success', 'Your order is confirmed!');
    }

    public function orderView()
    {
        $order = Order::with('user')->get();
        $orderItem = OrderItem::all();
        // dd($order, $orderItem, $product);
        return view('order.orderView', compact('order'));
    }

    public function orderListView($id)
    {
        $orderItem = OrderItem::where('orderid', $id)->get();
        $order = Order::with('user')->get();
        return view('order.orderListView', compact('orderItem','order'));
    }
}
