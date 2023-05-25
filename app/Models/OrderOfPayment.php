<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderOfPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'user_id',
        'payment_amount',
        'payment_due_date',
        'or_number',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function applicationForm()
    {
        return $this->belongsTo(ApplicationForm::class);
    }
}
