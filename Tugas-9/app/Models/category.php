<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $table = "categorys";
    protected $guarded = ['id'];
    protected $fillable = ['id', 'name', 'status'];

    public function products(){
        return $this -> hasMany(product::class);
    }

}
