<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryAdmin extends Model
{
    use SoftDeletes;
    protected $table = 'tb_category';
    protected $fillable = ['categoriesName', 'parent_id'];
}
