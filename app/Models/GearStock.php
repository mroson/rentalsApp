<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class GearStock extends Model
{
    use HasFactory;

    // Define las propiedades que se pueden llenar masivamente
    protected $fillable = [
        'name',
        'type',
        'image',
        'available', // Incluye 'available' si la columna existe en la tabla
    ];

    
    // Define la relación con GearRental
    public function rentals()
    {
        // Asegúrate de que el nombre de la columna de clave foránea en GearRental sea correcto
        return $this->hasMany(GearRental::class, 'gear_id', 'id');
    }

    // Obtén el estado del gear
    public function getEstadoAttribute()
    {
        $latestRental = $this->rentals()->orderBy('rental_date', 'desc')->first();
        if ($latestRental) {
            return $latestRental->return_date ? 'Available' : 'Rented';
        }
        return 'Available';
    }

    // Si tu tabla tiene un nombre diferente al plural del modelo, especifica el nombre de la tabla
    protected $table = 'gear_stocks';
}
