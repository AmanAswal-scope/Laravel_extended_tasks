<?php

namespace BM\Books\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    public function categories(){
        return $this->hasOne(Category::class,'id','category_id');
    }

}
