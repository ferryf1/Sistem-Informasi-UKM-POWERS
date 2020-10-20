<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class Discussion extends Model
{
    //
    use Commentable;
    protected $fillable = [
        'judul',
        'deskripsi',
        'filename',
        ];

    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
