<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;          // MongoDB enabled Eloquent class

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'hobby',
        'date_of_birth',
        'photo',
        'age',
        'status',
        'vehicle',
        'address',
    ];
}
