<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['id_parking_space',
                            'id_parking_lot',
                            'id_parking_lot_type',
                            'name',
                            'type',
                            'occupied',
                            'created_at',
                            'normal_available',
                            'normal_occupied',
                            'handicap_available',
                            'handicap_occupied',
                            'parking_space_name'
                            ];

    public function lots()
        {
            return $this->belongsTo(Lot::class);
        }
}
