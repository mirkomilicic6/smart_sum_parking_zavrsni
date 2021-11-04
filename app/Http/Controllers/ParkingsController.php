<?php

namespace App\Http\Controllers;

use App\Models\Lot;
use App\Models\Event;
use App\Models\Parking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;


class ParkingsController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

    public function parking1(){
        $parking1 = Parking::find(1);
        $parking1count = DB::table('lots')
                        ->where('id_parking_lot', '=', '1')
                        ->where('occupied', '=', '1')
                        ->get()
                        ->count();

        $parking1latest = Event::where('id_parking_lot', '1')->latest()->first();
        $parking1lots = Lot::where('id_parking_lot', 1)->orderBy('parking_space_name', 'ASC')->get();
        //dd($subtotal);

        //CHART PARKING 1 LAST 30 DAYS TOTAL
        $chart_options = [
            'chart_title' => 'Parking 1: broj događaja po danima',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Event',
            'conditions' =>[
                ['condition' => 'id_parking_lot = 1', 'color' => 'blue', 'fill' => 'true'],
            ],
            'date_format' => 'd-m-Y',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'chart_type' => 'line',
        ];

        $chart2 = new LaravelChart($chart_options);

        //CHART PARKING 1 SPACES LAST 30 DAYS BY PARKING SPACE NAME
        $chart_options = [
            'chart_title' => 'Parking 1: broj događaja po parkirnim mjestima zadnjih 30 dana',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\Event',
            'conditions' =>[
                ['condition' => 'id_parking_lot = 1', 'color' => 'blue', 'fill' => 'true'],
            ],
            'date_format' => 'd-m-Y',
            'group_by_field' => 'parking_space_name',
            'group_by_period' => 'day',
            'filter_field' => 'created_at',
            'filter_days' => '30',
            'chart_type' => 'line',
            'chart_color' => '0,255,255',
        ];

        $chartParking1 = new LaravelChart($chart_options);

        return view('parkings.parking1', compact('chartParking1', 'chart2', 'parking1', 'parking1count', 'parking1latest', 'parking1lots'));
    }

    public function parking2(){

        $parking2 = Parking::find(2);
        $parking2count = DB::table('lots')
                        ->where('id_parking_lot', '=', '2')
                        ->where('occupied', '=', '1')
                        ->get()
                        ->count();

        $parking2latest = Event::where('id_parking_lot', '2')->latest()->first();
        $parking2lots = Lot::where('id_parking_lot', 2)->orderBy('parking_space_name', 'ASC')->get();

        //CHART PARKING 2 LAST 30 DAYS TOTAL
        $chart_options = [
            'chart_title' => 'Parking 2 statistika događaja po danima',
            'name' => 'Parking 2 statistika događaja po danima',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Event',
            'conditions' =>[
                ['condition' => 'id_parking_lot = 2', 'color' => 'red', 'fill' => 'true'],
            ],
            'date_format' => 'd-m-Y',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'chart_type' => 'line',
        ];

        $chartParking2 = new LaravelChart($chart_options);

        //CHART PARKING 2 SPACES LAST 30 DAYS BY PARKING SPACE NAME
        $chart_options = [
            'chart_title' => 'Parking 2: broj događaja po parkirnim mjestima zadnjih 30 dana',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\Event',
            'conditions' =>[
                ['condition' => 'id_parking_lot = 2', 'color' => 'red', 'fill' => 'true'],
            ],
            'date_format' => 'd-m-Y',
            'group_by_field' => 'parking_space_name',
            'group_by_period' => 'day',
            'filter_field' => 'created_at',
            'filter_days' => '30',
            'chart_type' => 'line',
            'chart_color' => '0,255,255',
        ];

        $chartParking2_1 = new LaravelChart($chart_options);


        return view('parkings.parking2', compact('chartParking2_1', 'chartParking2','parking2', 'parking2count', 'parking2latest',  'parking2lots'));
    }

    public function parking3(){

        $parking3 = Parking::find(3);
        $parking3count = DB::table('lots')
                        ->where('id_parking_lot', '=', '3')
                        ->where('occupied', '=', '1')
                        ->get()
                        ->count();

        $parking3latest = Event::where('id_parking_lot', '3')->latest()->first();
        $parking3lots = Lot::where('id_parking_lot', 3)->orderBy('parking_space_name', 'ASC')->get();

        //CHART PARKING 3 LAST 30 DAYS TOTAL
        $chart_options = [
            'chart_title' => 'Parking 3 statistika događaja po danima',
            'name' => 'Parking 3 statistika događaja po danima',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Event',
            'conditions' =>[
                ['condition' => 'id_parking_lot = 3', 'color' => 'green', 'fill' => 'true'],
            ],
            'date_format' => 'd-m-Y',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'chart_type' => 'line',
        ];

        $chartParking3 = new LaravelChart($chart_options);

        //CHART PARKING 3 SPACES LAST 30 DAYS BY PARKING SPACE NAME
        $chart_options = [
            'chart_title' => 'Parking 3: broj događaja po parkirnim mjestima zadnjih 30 dana',
            'name' => 'Parking 3: broj događaja po parkirnim mjestima zadnjih 30 dana',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\Event',
            'conditions' =>[
                ['condition' => 'id_parking_lot = 3', 'color' => 'green', 'fill' => 'true'],
            ],
            'date_format' => 'd-m-Y',
            'group_by_field' => 'parking_space_name',
            'group_by_period' => 'day',
            'filter_field' => 'created_at',
            'filter_days' => '30',
            'chart_type' => 'line',
            'chart_color' => '0,255,255',
        ];

        $chartParking3_1 = new LaravelChart($chart_options);

        return view('parkings.parking3', compact('chartParking3_1', 'chartParking3', 'parking3', 'parking3count', 'parking3latest',  'parking3lots'));
    }
}
