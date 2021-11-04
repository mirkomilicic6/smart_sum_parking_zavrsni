<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Lot;
use App\Models\Event;
use GuzzleHttp\Client;
use App\Models\Parking;
use App\Models\ParkingLot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class DashboardControlller extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

    public function index(Parking $chart) {


        $parkings = Parking::with('lots')->get();
        $allLots = Lot::all();

        $parking1lots = Lot::where('id_parking_lot', 1)->orderBy('parking_space_name', 'ASC')->get();
        $parking2lots = Lot::where('id_parking_lot', 2)->orderBy('parking_space_name', 'ASC')->get();
        $parking3lots = Lot::where('id_parking_lot', 3)->orderBy('parking_space_name', 'ASC')->get();

        $parking1count = DB::table('lots')
                        ->where('id_parking_lot', '=', '1')
                        ->where('occupied', '=', '1')
                        ->get()
                        ->count();
        $parking1counter = Event::latest()->where('id_parking_lot', '1')->take(1)->get();

        $parking2count = DB::table('lots')
                        ->where('id_parking_lot', '=', '2')
                        ->where('occupied', '=', '1')
                        ->get()
                        ->count();
        $parking2counter = Event::latest()->where('id_parking_lot', '2')->take(1)->get();

        $parking3count = DB::table('lots')
                        ->where('id_parking_lot', '=', '3')
                        ->where('occupied', '=', '1')
                        ->get()
                        ->count();
        $parking3counter = Event::latest()->where('id_parking_lot', '3')->take(1)->get();

        $parking1 = Parking::find(1);
        $parking2 = Parking::find(2);
        $parking3 = Parking::find(3);

        $lot1 = Lot::find(1);
        $lot2 = Lot::find(2);
        $lot3 = Lot::find(3);

        $parking1latest = Event::where('id_parking_lot', '1')->latest()->first();
        $parking2latest = Event::where('id_parking_lot', '2')->latest()->first();
        $parking3latest = Event::where('id_parking_lot', '3')->latest()->first();

        $svi_zauzeti = $parking1count + $parking2count + $parking3count;
        $ukupno_parkinga = $parking1->capacity + $parking2->capacity + $parking3->capacity;

        $events = Event::latest()->paginate(15);
        $allEvents = Event::all()->count();
        $avgEvents = round(($allEvents / 3), 2);
        $last24h = Event::where('created_at', '>=', Carbon::now()->subDay())->count();


        //dd($parking1counter);

        $chart_options = [
            'chart_title' => 'Statistika po parkinzima',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\Event',
            'group_by_field' => 'id_parking_lot',
            'group_by_period' => 'week',
            'chart_type' => 'bar',
            'date_format' => 'd-m-Y',
            'chart_color' => '0,255,255',
        ];

        $chart = new LaravelChart($chart_options);

        //dd($lot1->parking->name);
        return view('dashboard', compact('parking1counter', 'parking2counter', 'parking3counter', 'last24h', 'allLots', 'avgEvents', 'allEvents', 'chart', 'svi_zauzeti', 'ukupno_parkinga', 'lot1', 'lot2', 'lot3', 'events', 'parkings', 'parking1', 'parking2', 'parking3', 'parking1lots', 'parking2lots', 'parking3lots', 'parking1count', 'parking2count', 'parking3count', 'parking1latest', 'parking2latest', 'parking3latest'));
    }


    public function admin_page() {
        return view('admin');
    }

    public function fetchParkings() {

        $response = Http::get('https://demo.smart.sum.ba/parking');

        $allParkings = json_decode($response->body());
        //dd($parkings);
        foreach($allParkings as $parking){
            $parkings = new Parking();
            $parkings->id = $parking->id;
            $parkings->daily_payment = $parking->daily_payment;
            $parkings->name = $parking->name;
            $parkings->id_type = $parking->id_type;
            $parkings->has_custom_business_hours = $parking->has_custom_business_hours;
            $parkings->address = $parking->address;
            $parkings->is_payment_enabled = $parking->is_payment_enabled;
            $parkings->vendor_parking_lot_id = $parking->vendor_parking_lot_id;
            $parkings->ppk_only = $parking->ppk_only;
            $parkings->description = $parking->description;
            $parkings->capacity = $parking->capacity;
            $parkings->capacity_handicap = $parking->capacity_handicap;
            $parkings->capacity_taxi = $parking->capacity_taxi;
            $parkings->capacity_reserved = $parking->capacity_reserved;
            $parkings->capacity_echarge = $parking->capacity_echarge;
            $parkings->lat = $parking->lat;
            $parkings->lng = $parking->lng;
            $parkings->is_active = $parking->is_active;
            $parkings->zoneId = $parking->zoneId;
            $parkings->zone = $parking->zone;
            $parkings->price = $parking->price;
            $parkings->price_extra = $parking->price_extra;
            $parkings->daily_price = $parking->daily_price;
            $parkings->period = $parking->period;
            $parkings->sms_number = $parking->sms_number;
            $parkings->color_hex = $parking->color_hex;
            $parkings->max_duration = $parking->max_duration;
            $parkings->has_sensors = $parking->has_sensors;
            $parkings->lot_daily_price = $parking->lot_daily_price;
            $parkings->open_time = $parking->open_time;
            $parkings->close_time = $parking->close_time;
            $parkings->type = $parking->type;
            $parkings->normal_available = $parking->normal_available;
            $parkings->normal_occupied = $parking->normal_occupied;
            $parkings->handicap_available = $parking->handicap_available;
            $parkings->handicap_occupied = $parking->handicap_occupied;
            $parkings->capacity_normal = $parking->capacity_normal;

            $parkings->save();
    }
    return "DONE";

    }

    public function fetchLots() {

        $response = Http::get('https://demo.smart.sum.ba/parking?withParkingSpaces=1');

        $lots = json_decode($response->body());
        //dd($lots);
        foreach($lots as $parking){

        foreach($parking->parkingSpaces as $data){
            //echo $data->updated_at;

            $lot = new Lot();
            $lot->id = $data->id;
            $lot->id_parking_lot = $data->id_parking_lot;
            $lot->id_parking_type = $data->id_parking_type;
            $lot->occupied = $data->occupied;
            $lot->lat = $data->lat;
            $lot->lng = $data->lng;
            $lot->updated_at = $data->updated_at;
            $lot->parking_space_name = $data->parking_space_name;
            $lot->last_event = date('Y-m-d H:i:s' , strtotime($data->last_event));
            $lot->type = $data->type;
            $lot->is_visible = $data->is_visible;

            $lot->save();
    }
}
    return "DONE";

    }

    public function getData() {

    $podaci = Http::get('https://demo.smart.sum.ba/parking')->json();
    dd($podaci);
    return view('admin.index', compact('podaci'));
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }



}
