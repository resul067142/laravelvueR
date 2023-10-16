<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::query()->get();
        return response()->json($products);
    }

    public function store(Request $request) {

        $product = Product::create(
            [
                'name' => $request->name,
                'qty' => $request->qty,
            ]
        );

        return response()->json($product);
    }

    public function show($id) {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);
        $product->update($request->all());

        return response()->json($product);
    }

    public function destroy($id) {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'ürün bulunamadı'], 404);
        }

        $product->delete();

        return response()->json(['message' => $product->name . ' isimli ürün silindi']);
    }
}
