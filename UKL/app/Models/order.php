<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $table="list_order";
    protected $primarykey="id_order";
    public $fillable=["customer","type","order date", 'id_detail'];
    public $timestamps=false;

 
}
