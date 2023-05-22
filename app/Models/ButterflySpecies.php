<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ButterflySpecies extends Model
{
    use HasFactory;
    protected $fillable = [
        'species_type',
        'class_name',
        'family_name',
        'common_name',
        'scientific_name',
        'description',
       
    ];

}
