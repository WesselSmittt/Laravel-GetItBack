<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ritten extends Model
{
    use HasFactory;

    protected $table = 'ritten'; // Hier geef je de juiste tabelnaam op


    protected $fillable = [
        'naam_verzender',
        'adres_verzender',
        'postcode_verzender',
        'plaats_verzender',
        'naam_ontvanger',
        'adres_ontvanger',
        'postcode_ontvanger',
        'plaats_ontvanger',
        'kosten',
        'aantal_km',
    ];

    // Je kunt eventuele relaties hier definiëren, bijvoorbeeld:

    // public function user() {
    //     return $this->belongsTo(User::class);
    // }
}
