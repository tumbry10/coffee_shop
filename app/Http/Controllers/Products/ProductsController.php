<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;

class ProductsController extends Controller
{
    //
    public function singleProduct($id){
        $product = Product::find($id);

        //Displaying Related Products 
        $relatedProducts = Product::where('type', $product->type)
            ->where('id', '!=', $id)->take('4')
            ->orderBy('id', 'desc')
            ->get();

        return view('products.productSingle', compact('product', 'relatedProducts'));
    }
}
