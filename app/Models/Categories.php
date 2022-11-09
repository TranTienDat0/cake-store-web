<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $table = 'tb_category';

    public function categoryChildrent(){

        return $this->hasMany(Categories::class,'parent_id' );
    }

    public function products(){
        return $this->hasMany(Products::class, 'category_id');
    }
}
