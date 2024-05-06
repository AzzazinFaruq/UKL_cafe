<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    use HasFactory;
    protected $table="detail_order";
    protected $primarykey="id_detail";
    public $fillable=['id_order','id_produk','jumlah','price'];
    public $timestamps=false;
}

