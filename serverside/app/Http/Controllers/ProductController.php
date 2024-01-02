<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{

    public function index()
    {
        $product =Product::all();

        return response()->json($product);
    }

    public  function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'buying_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'stock' => 'required|string',
            'description' => 'required|string',
        ]);

        $product=Product::create($request->all());
        return response()->json($product,201);
    }

    public function update(Request $request,Product $product)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'buying_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'stock' => 'required|string',
            'description' => 'required|string',
        ]);

        $product->update($request->all());

        return response()->json($product,200);

    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json(null,204);
    }






}
