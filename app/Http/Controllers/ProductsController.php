<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use File;

class ProductsController extends Controller
{
    public function storeProduct(Request $req) {
        $data = new Products;

        if($req->hasFile('img')) {
            $img = $req->file('img');
            $imgName = $img->getClientOriginalName();
            $destPath = public_path('/images/Products');
            $img->move($destPath, $imgName);

            $data->name = $req->name;
            $data->price = $req->price;
            $data->description = $req->description;
            $data->stock = $req->stock;
            $data->img_path = $imgName;
            $data->save();
        }
        return redirect('/products');
    }

    public function updateProduct(Request $req, $id) {
        $data = Products::find($id);

        if($req->hasFile('img')) {
            $image = public_path("/images/Merch/{$data->img_path}"); // get previous image from folder
            if (File::exists($image)) { // unlink or remove previous image from folder
                unlink($image);
            }
            $img = $req->file('img');
            $imgName = $img->getClientOriginalName();
            $destPath = public_path('/images/Products');
            $img->move($destPath, $imgName);

            $data->img_path = $imgName;
        }

        $data->name = $req->name;
        $data->price = $req->price;
        $data->description = $req->description;
        $data->stock = $req->stock;
        $data->update();

        return redirect('/products');
    }

    public function deleteProduct(Request $req, $id) {
        $data = Products::find($id);
        $image = public_path('images/Prodcuts/{$data->img_path}'); // get previous image from folder
        if (File::exists($image)) { // unlink or remove previous image from folder
            unlink($image);
        }
        $data->delete();

        return redirect('/products');
    }
}
