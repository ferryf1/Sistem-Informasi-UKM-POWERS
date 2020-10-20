<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    //
    protected $fillable = [
        'judul',
        'category_id',
        'deskripsi',
        'filename',
        ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
