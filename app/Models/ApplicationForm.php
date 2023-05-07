<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationForm extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function butterflies(){
        return $this->hasMany(Butterfly::class,'application_forms_id');
    }

    protected $fillable = [
        'name', 'address','transport_address', 'purpose','transport_date' ,'mode_of_transport','status',
      ];
}
