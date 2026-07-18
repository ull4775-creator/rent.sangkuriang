<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        // Mengambil data langsung dari file array (tanpa database)
        $products = collect(require base_path('app/Data/products_data.php'));
        
        return view('welcome', compact('products'));
    }

    public function getProductDetail($id)
    {
        $products = collect(require base_path('app/Data/products_data.php'));
        $product = $products->firstWhere('id', (int)$id);

        if (!$product) {
            abort(404);
        }

        return response()->json($product);
    }
}