<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewRanger extends Model
{
    //
    protected $table = 'newrangers';
    protected $fillable = [
        'namalengkap',
        'nim',
        'jurusan',
        'prodi',
        'email',
        'nohandphone',
        'semester',
        'alasan',
        ];
}
