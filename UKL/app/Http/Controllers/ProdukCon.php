<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\produk;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
    
class ProdukCon extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    public function getproduk()
    {
        $dt_produk = produk::get();
        return response()->json($dt_produk);
    }
    public function getproduk1($id)
    {
        $dt_produk = produk::where('id_produk',$id)->get();
        return response()->json($dt_produk);
    }
    public function addproduk(Request $req)
    {
        $validator = validator::make($req->all(), [
            'name' => 'required',
            'size' => 'required',
            'price' => 'required',
            'image' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }
        $current_date = date('Y-m-d H:i:s');
        $save =  produk::create([
            'name' => $req->get('name'),
            'size' => $req->get('size'),
            'price' => $req->get('price'),
            'image' => $req->get('image'),
            

        ]);
        if ($save) {
            return response()->json(['status' => true, 'message' => 'SuksesLur']);
        } else {
            return response()->json(['status' => false, 'message' => 'GagalLur']);
        }
    }
    public function updateproduk(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'size' => 'required',
            'price' => 'required',
            'image' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }

        $ubah = produk::where('id_produk', $id)->update([
            'name' => $req->get('name'),
            'size' => $req->get('size'),
            'price' => $req->get('price'),
            'image' => $req->get('image')
        ]);

        if ($ubah) {
            return response()->json(['status' => true, 'message' => 'Sukses Masbro']);
        } else {
            return response()->json(['status' => false, 'message' => 'Gagal Masbro']);
        }
    }
    public function deleteproduk($id)
    {
        $hapus=produk::where('id_produk',$id)->delete();
        if ($hapus) {
            return response()->json(['status' => true, 'message' => 'Sukses Masbro']);
        } else {
            return response()->json(['status' => false, 'message' => 'Gagal Masbro']);
        }
    }
}

