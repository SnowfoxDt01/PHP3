<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function listProduct(){
        $listProduct = Product::select('product_id', 'name', 'price')->get();

        return response()->json([
            'message' => 'success',
            'data' => $listProduct,
            'status_code' => '200'
        ], 200);
    }

    public function getProduct($idProduct){
        $product = Product::select('product_id', 'name', 'price')
            ->find($idProduct);
            // ->where('id', $idProduct)->fist();

        return response()->json([
            'message' => 'success',
            'data' => $product,
            'status_code' => '200'
        ], 200);
    }

    public function addProduct(Request $req){
        $linkImage = '';
        if($req->hasFile('imageSP')){
            $image = $req->file('imageSP');
            $newName = time() . '.' . $image->getClientOriginalExtension();
            $linkStorage = 'imageProducts/';
            $image->move(public_path($linkStorage), $newName);

            $linkImage = $linkStorage . $newName;
        }
        $validatedData = $req->validate([
            'nameSP' => 'required',
            'priceSP' => 'required'
        ]);
        $data = [
            'name' => $req->nameSP,
            'price' => $req->priceSP,
            'image' => $linkImage
        ];
        
        
        $newProduct = Product::create($data);
        return response()->json([
            'message' => 'success',
            'data' => $newProduct,
            'status_code' => '201'
        ], 201);
    }
    
    public function updateProduct(Request $req){
        $data = [
            'name' => $req->name,
            'price' => $req->price,
        ];
        $product = Product::find($req->idProduct);
        $product->update($data);
        return response()->json([
            'message' => 'success',
            'data' => $product,
            'status_code' => '200'
        ], 200);
    }

    public function deleteProduct(Request $req){
        $product = Product::find($req->idProduct);
        if($product->image != null){
            File::delete(public_path($product->image));
        }
        $product->delete();
        return response()->json([
            'message' => 'success',
            'status_code' => '200'
        ], 200);
    }
}
