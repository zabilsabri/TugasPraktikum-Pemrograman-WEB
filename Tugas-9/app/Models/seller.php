<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seller extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function products(){
        return $this -> hasMany(product::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(permission::class, 'seller_permissions', 'seller_id', 'permission_id');
    }

    protected function CreatedAt(): Attribute
   {
       return Attribute::make(
           get: fn ($value) => Carbon::parse($value)->format('d-m-Y'),
       );
   }

    public function getUpdatedAtAttribute(){  
        return date('d-m-Y', strtotime($value));
    }
}