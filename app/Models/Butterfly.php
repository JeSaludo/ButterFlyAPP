<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Butterfly extends Model
{
    use HasFactory;

    protected $fillable = [
      'butterfly_name', 'quantity'  
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
