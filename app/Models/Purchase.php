<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    /** @use HasFactory<\Database\Factories\PurchaseFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'subtotal',
        'total',
    ];

    public function details():HasMany
    {
        return $this->hasMany(PurchaseDetail::class);
    }
}
