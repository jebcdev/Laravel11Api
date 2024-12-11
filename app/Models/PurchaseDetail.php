<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseDetail extends Model
{
    /** @use HasFactory<\Database\Factories\PurchaseDetailFactory> */
    use HasFactory,SoftDeletes;
    
        protected $fillable = [
            'purchase_id',
            'product_id',
            'price',
            'quantity',
            'subtotal',
        ];

        public function purchase():BelongsTo
        {
            return $this->belongsTo(Purchase::class);
        }

        public function product():BelongsTo
        {
            return $this->belongsTo(Product::class);
        }
}
