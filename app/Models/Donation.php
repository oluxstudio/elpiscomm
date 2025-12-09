<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'donor_id',
        'amount',
        'currency',
        'payment_method',
        'payment_status',
        'transaction_id',
        'payment_details',
        'notes',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'payment_details' => 'array',
    ];

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }
}
