<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    //
    //protected $table = 'pengumumans';
    protected $fillable = [
        'uuid',
        'judul',
        'deskripsi',
        'fileattach',
        ];

        protected $dates = ['created_at', 'updated_at', 'disabled_at','mydate'];
}
