<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'daily_payment', 'name', 'id_type', 'has_custom_business_hours', 'address', 'is_payment_enabled', 'vendor_parking_lot_id', 'ppk_only', 'description', 'capacity', 'capacity_handicap', 'capacity_taxi', 'capacity_reserved', 'capacity_echarge', 'lat', 'lng', 'is_active', 'zoneId', 'zone', 'price', 'price_extra', 'daily_price', 'period', 'sms_number', 'color_hex', 'max_duration', 'has_sensors', 'lot_daily_price', 'open_time', 'close_time', 'type', 'normal_available', 'normal_occupied', 'handicap_available', 'handicap_occupied', 'capacity_normal'];

    public function lots()
    {
        return $this->hasMany(Lot::class, 'id_parking_lot');
    }
}
