<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['id', 'name', 'seller_id', 'category_id', 'price', 'status'];

    public function seller(){
        return $this->belongsTo(seller::class);
    }

    public function category(){
        return $this->belongsTo(category::class);
    }
}
