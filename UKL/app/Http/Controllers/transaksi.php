<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\order_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class transaksi extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    //tambah item
    public function tambahItem(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            'id_produk' => 'required',
            'jumlah' => 'required',
            // 'id_order' => 'required',
            'price' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $save = order_detail::create([
            'id_produk' => $req->input('id_produk'),
            'jumlah' => $req->input('jumlah'),
            'id_order' => $id,
            'price' => $req->input('price'),
        ]);
        if ($save) {
            return response()->json(['success' => true, 'message '=>'sukses menmbahkan pesanan']);
        } else {
            return response()->json(['success' => false]);
        }
    }
    //order baru
    public function order(request $req){
        $validator = Validator::make($req->all(), [
            'customer' => 'required',
            'type' => 'required',
            
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $save = order::create([
            'customer' => $req->input('customer'),
            'type' => $req->input('type')
        ]);
        if ($save) {
            return response()->json(['success' => true, 'message'=>'customer telah ditambahkan']);
        } else {
            return response()->json(['success' => false, 'message' =>'gagal']);
        }
    }
    // get order
    public function getdetail($id)
    {
       $order=order::where('id_order', $id)->get();
       $detail = order_detail::where('id_order',$id)->get();

       $gather = $order->map(function($orderer) use ($detail){
        $orderer->setAttribute('order_detail', $detail);
        return $orderer;
       });

       $response=[
        'status'=> true,
        'data' => $gather,
        "message"=>'Order list has retrivied'
       ];
        return response()->json($response);
        
      
    
}
public function getdetailall()
{
   $order=order::get();
   $detail = order_detail::get();

   $gather = $order->map(function($orderer) use ($detail){
    $orderer->setAttribute('order_detail', $detail);
    return $orderer;
   });

   $response=[
    'status'=> true,
    'data' => $gather,
    "message"=>'Order list has retrivied'
   ];
    return response()->json($response);
    
  

}
}
//     public function getdetail($id)
//     {
//         $dt_produk = order_detail::where('id_order', $id)->get();
//         return response()->json($dt_produk);
//     }

//     public function getOrder(){
//         $dt = order::get();
//         return response()->json($dt);
//     }
// }


