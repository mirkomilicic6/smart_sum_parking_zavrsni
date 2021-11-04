<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_parking_lot',
        'id_parking_type',
        'occupied',
        'lat',
        'lng',
        'updated_at',
        'parking_space_name',
        'last_event',
        'type',
        'is_visible'
    ];
    public function parking()
    {
        return $this->belongsTo(Parking::class, 'id');
    }

    public function events()
        {
            return $this->hasMany(Event::class, 'id_parking_space');
        }
}
