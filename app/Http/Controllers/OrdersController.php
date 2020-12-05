<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use App\Models\Orders;

class OrdersController extends Controller
{
    public function storeOrder(Request $req) {
        $product = Products::find($req->product_id);
        $amount = $req->quantity * $product->price;

        $data = new Orders;

        $data->buyer_name = $req->buyer_name;
        $data->product_id = $req->product_id;
        $data->amount = $amount;
        $data->buyer_contact = $req->buyer_contact;

        $data->save();

        return redirect('/history');
    }
}
