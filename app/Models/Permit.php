<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permit extends Model
{
    use HasFactory;


    protected $fillable = [
        'permit_type',
        'permit_no',
        'business_name',
        'owner_name',
        'address',
        'issue_date',
        'expiration_date',
        'certificate',
    ];

    protected $dates = [
        'issue_date',
        'expiration_date',
    ];
        
    
}
