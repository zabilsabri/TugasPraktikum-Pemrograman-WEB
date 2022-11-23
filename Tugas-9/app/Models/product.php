<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function seller(){
        return $this->belongsTo(seller::class);
    }

    public function category(){
        return $this->hasOne(category::class);
    }
}
