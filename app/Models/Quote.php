<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model Quote
 *
 * @property-read int $id
 * @property int $request_amount
 *
 * @property string $quote
 *
 * @namespace App\Models
 */
class Quote extends Model
{
    use HasFactory;

    protected $fillable = [
        'quote',
        'request_amount',
    ];
}
