<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use Auth;
use App\Models\Product\Cart;
use Redirect;

class ProductsController extends Controller
{
    //Displaying A Single Product details page
    public function singleProduct($id){
        $product = Product::find($id);

        //Displaying Related Products 
        $relatedProducts = Product::where('type', $product->type)
            ->where('id', '!=', $id)->take('4')
            ->orderBy('id', 'desc')
            ->get();
        
        //Checking for product in cart
        $checkInCart = Cart::where('prod_id', $id)
            ->where('user_id', Auth::user()->id)
            ->count();

        return view('products.productSingle', compact('product', 'relatedProducts', 'checkInCart'));
    }

    //Add to Cart function
    public function addtoCart(Request $request, $id){
        $addtoCart = Cart::create([
            'user_id' => Auth::id(),
            'prod_id' => $id,
            'name' => $request->name,
            'image' => $request-> image,
            'price' => $request-> price,
            'description' => $request-> description,
        ]);

        //echo "Item Added to Cart";
        return redirect()->back()->with('success', 'Item Added to Cart');
    }
}
