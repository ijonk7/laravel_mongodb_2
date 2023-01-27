<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;          // MongoDB enabled Eloquent class

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
