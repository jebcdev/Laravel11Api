<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    /** @use HasFactory<\Database\Factories\ClientFactory> */
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'dni',
        'name',
        'saurname',
        'email',
        'phone',
        'address',
    ];
}


