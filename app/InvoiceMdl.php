<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceMdl extends Model
{
    protected $fillable = [
        'orders_id',
        'item_name',
        'description',
        'single_amount',
        'single_paid',
        'single_due',
        'total_amount',
        'total_paid',
        'total_due'
    ];
}
