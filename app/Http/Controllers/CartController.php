<?php

namespace App\Http\Controllers;

use App\Models\Bicycle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CartUserOrderDetails;
use App\Models\Order;
use App\Models\OrderItems;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(session('cartItems')); 
        return view('layouts.cart');
    }

    /**
     * addToCart a newly created resource in storage.
     */
    public function addToCart(Request $request)
    {

        $bicycle = Bicycle::FindOrFail($request->id);

        $cartItems = Session::get('cartItems', []);
        if (isset($cartItems[$request->id])) {
            $cartItems[$request->id]['quantity']++;
        } else {

            $cartItems[$request->id] =
                [
                    "image_path" => $bicycle->image_path,
                    "brand" => $bicycle->brand,
                    "model" => $bicycle->model,
                    "frame_size" => $bicycle->frame_size,
                    "price" => $bicycle->price,
                    "quantity" => $request->quantity

                ];
        }

        Session::put('cartItems', $cartItems);
        return redirect()->back()->with('success', $bicycle->brand . ' ' . $bicycle->model . ' ' . 'was successfully added to the cart');
    }

    public function updateFromCart(Request $request, $id)
    {
            $bicycle = Bicycle::where('id',$id)->first();
             if ($request->id && $request->quantity) {
            $cartItems = Session::get('cartItems');
            if( $bicycle->quantity < $request->quantity)
            {
                return redirect()->back()->with('error', 'Please order max ' . $bicycle->quantity . ' Bicycles !');
            }
            $cartItems[$request->id]['quantity'] = $request->quantity;
            Session::put('cartItems', $cartItems);
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteFromCart(Request $request)
    {
        if ($request->id) {
            $cartItems = Session::get('cartItems');
            if (isset($cartItems[$request->id])) {
                unset($cartItems[$request->id]);
                Session::put('cartItems', $cartItems);
            }

            return redirect()->back()->with('success', 'Cart item was deleted successfully!');
        }
    }



    public function placeOrder()
    {
        $totalPrice = $this->totalPrice();
        return view('layouts.userDetailsOrder', compact('totalPrice'));
    }

    public function userDetailsOrder(CartUserOrderDetails $request)
    {
        $order = Order::create([

            "firstName" => $request->firstName,
            "lastName" => $request->lastName,
            "email" => $request->email,
            "phone" => $request->phone,
            "address" => $request->address,
            "totalPrice" => $request->totalPrice
        ]);

        foreach (Session::get('cartItems') as $key => $value) {

            OrderItems::create([
                "order_id" => $order->id,
                "bicycle_id" => $key,
                "quantity" => $value['quantity'],
                "price" => floatval($value['price'])
            ]);

            $bicycle = Bicycle::where('id', $key)->first();
            $bicycle->quantity = $bicycle->quantity - $value['quantity'];
            $bicycle->update();
        }

        Session::flush(); 
        return redirect()->route('pages.index');
    }

    private function totalPrice()
    {
        $totalPrice = 0;
        foreach (Session::get('cartItems') as $item) {
            $totalPrice += intval($item['quantity']) * intval($item['price']);
        }

        return $totalPrice = $totalPrice + (($totalPrice / 100) * 19);
    }


}
