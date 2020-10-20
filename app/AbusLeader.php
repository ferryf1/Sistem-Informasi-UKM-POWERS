<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbusLeader extends Model
{
    //
    protected $table = 'abusleader';
    protected $fillable = [
        'nama',
        'instagram',
        'deskripsi',
        'filename',
        ];
}
