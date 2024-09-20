<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use Dompdf\FrameDecorator\Table;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;

class CartController extends Controller
{
    public function orderItems(Request $request)
    {
        // Get the cart from the session, or an empty array if it doesn't exist
        $cart = $request->session()->get('cart', []);

        // Fetch menus from the database
        $menus = Menu::all();

        // Pass both the cart and menus to the Blade template
        return view('backend.orderitems', compact('menus', 'cart'));
    }

    public function addToCart(Request $request, $id)
    {
        // Retrieve the item from the database
        $menu = Menu::find($id);

        if (!$menu) {
            return redirect()->back()->with('error', 'Menu item not found!');
        }

        // Get the cart from the session
        $cart = $request->session()->get('cart', []);

        // Add item to cart or update quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $request->input('quantity', 1);
        } else {
            $cart[$id] = [
                'id' => $menu->id,
                'name' => $menu->name,
                'price' => $menu->price,
                'quantity' => $request->input('quantity', 1),
            ];
        }

        // Save the cart back to the session
        $request->session()->put('cart', $cart);

        // Redirect back to the menu page
        return redirect()->route('orderitems')->with('success', 'Item added to cart!');
    }

    public function removeFromCart(Request $request, $id)
    {
        // Get the cart from the session
        $cart = $request->session()->get('cart', []);

        // Remove the item from the cart
        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        // Save the updated cart to the session
        $request->session()->put('cart', $cart);

        // Redirect back to the order items page
        return redirect()->route('orderitems')->with('success', 'Item removed from cart!');
    }

// $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$  //
    public function showPayBill()
{
    $cart = session()->get('cart', []);
    $cartTotal = 0;

    foreach ($cart as $item) {
        $cartTotal += $item['price'] * $item['quantity'];
    }

    return view('backend.paybill', compact('cart', 'cartTotal'));
}
// $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$  //


// In your CartController or a similar controller




    public function clearCart(Request $request)
    {
        // Clear the cart from the session
        $request->session()->forget('cart');

        // Redirect back to the order items page
        return redirect()->route('orderitems')->with('success', 'Cart cleared!');
    }
}
