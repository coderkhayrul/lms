<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded = [];

    //    Invoice belongsTo InvoiceItem
    public function items(): HasMany
    {
        return $this->hasMany(InvoiceItem::class);
    }

    //    Invoice Has One User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function amount()
    {
        $amounts = [
            'total' => 0,
            'paid' => 0,
            'due' => 0,
        ];

        foreach ($this->items as $item) {
            $amounts['total'] += $item->price * $item->quantity;
        }
        foreach ($this->payments as $payment) {
            $amounts['paid'] += $payment->amount;
        }
        $amounts['due'] = $amounts['total'] - $amounts['paid'];
        return $amounts;
    }
}
