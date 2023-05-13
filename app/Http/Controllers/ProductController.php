<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class productController extends Controller
{
    public function addProduct()
    {
        return view('addProduct');
    }

    public function insertProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'p_name' => 'required',
            'p_id' => 'required|max:6',
            'p_quantity' => 'required|integer|max:100',
            'p_description' => 'required|max:250'
        ],
        [
            'p_name.required' => 'Product Name is required',
            'p_id.required' => 'Product ID is required',
            'p_id.max' => 'Product ID can not be more than 6 characters',
            'p_quantity.required' => 'Quantity is required',
            'p_quantity.max' => 'Quantity must not be more than 100',
            'p_description.required' => 'Product Description is required',
        ]);

        if($validator->fails()){
            return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
        }else
        {
            Product::create([
                'name' => $request->p_name,
                'p_id' => $request->p_id,
                'quantity' => $request->p_quantity,
                'description' => $request->p_description
            ]);

            return redirect(route('product.view'))->with('status', 'Product added successfully!');
        }

    }

    public function viewProduct()
    {
        $products = Product::all();
        return view('showProduct', compact('products'));
    }

    public function updateProduct(Product $product)
    {
        return view('updateProduct', compact('product'));
    }

    public function editProduct(Request $request, $id)
    {
        // dd($request->all());
        Product::where('id', $id)->update([
            'name' => $request->p_name,
            'p_id' => $request->p_id,
            'quantity' => $request->p_quantity,
            'description' => $request->p_description,
        ]);

        return redirect(route('product.view'))->with('status', 'Product updated successfully!');
    }

    public function deleteProduct($id)
    {
        Product::where('id', $id)->delete();
        return redirect(route('product.view'))->with('status', 'Product deleted successfully!');
    }
}
