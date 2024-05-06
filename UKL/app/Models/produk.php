<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
   
        protected $table="produk";
        protected $primarykey="id_produk";
        public $fillable=["name","size","price","image","createdAt","updatedAt"];
        public $timestamps=false;

}
