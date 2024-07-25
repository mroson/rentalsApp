<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GearRental extends Model
{
    use HasFactory;

    protected $table = 'gear_rentals';

    protected $fillable = ['user_id', 'gear_id', 'rental_date', 'return_date'];

    // Relación con GearStock
    public function gearStock()
    {
        return $this->belongsTo(GearStock::class, 'gear_id');
    }

    // Relación con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
