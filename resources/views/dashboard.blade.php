@extends('layouts.admin')

@section('content')
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Homepage of admin panel</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>

    <link rel="stylesheet" href="//releases.flowplayer.org/7.0.4/commercial/skin/skin.css">


  </head>
  <body>

      <div class="container">
{{-- NOVO --}}
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Podaci o parkingu:</h5>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>


          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-8">
              <p class="text-center">
              </p>

              <div class="chart">
                <!-- Sales Chart Canvas -->
                {!! $chart->renderHtml() !!}

            </div>
              <!-- /.chart-responsive -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
              <p class="text-center">
                <strong>Trenutno stanje na parkinzima:</strong>
              </p>

              <div class="progress-group">
                Ukupno zauzeto parkirnih mjesta
                <span class="float-right"><b>{{$parking1count + $parking2count + $parking3count}}</b>/{{ $ukupno_parkinga }}</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-warning" style="width: {{(($parking1count + $parking2count + $parking3count) / ($parking1->capacity + $parking2->capacity + $parking3->capacity)) * 100}}%"></div>
                </div>
              </div>
              <!-- /.progress-group -->

              <div class="progress-group">
                {{ $parking1->name }}
                <span class="float-right"><b>{{$parking1count}}</b>/{{ $parking1->capacity }}</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-primary" style="width: {{$parking1count / $parking1->capacity * 100}}%"></div>
                </div>
              </div>
              <!-- /.progress-group -->

              <div class="progress-group">
                {{ $parking2->name }}
                <span class="float-right"><b>{{$parking2count}}</b>/{{ $parking2->capacity }}</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-danger" style="width: {{$parking2count / $parking2->capacity * 100}}%"></div>
                </div>
              </div>

              <!-- /.progress-group -->
              <div class="progress-group">
                <span class="progress-text">{{$parking3->name}}</span>
                <span class="float-right"><b>{{$parking3count}}</b>/{{ $parking3->capacity }}</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-success" style="width: {{$parking3count / $parking3->capacity * 100}}%"></div>
                </div>
              </div>

              <!-- /.progress-group -->
              <div class="card card-warning mt-4 collapsed-card text-center">
                <div class="card-header">
                    <h3 class="card-title text-center"><b>NAPOMENA</b></h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-plus"></i>
                    </button>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  Stvarno stanje parkinga je broj ukupnih događaja podijeljen sa 2 jer nam senzor za svaki dolazak/odlazak automobila šalje 2 događaja.
                </div>
                <!-- /.card-body -->
              </div>
              <div class="card card-primary collapsed-card">
                <div class="card-header">
                  <h3 class="card-title"><b>PARKING LIVE STREAM</b></h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-plus"></i>
                    </button>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="info-box mb-3 bg-info">
                        <span class="info-box-icon"><i class="fas fa-play-circle"></i></span>

                        <div class="info-box-content">
                            <a href="#myModal" data-bs-toggle="modal"><button type="button" class="btn btn-block bg-gradient-danger btn-sm" style="text-decoration: none;">Parking video live stream</button></a>
                        </div>
                        <!-- /.info-box-content -->
                        <div id="myModal" class="modal fade">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Live feed kamere sa parkinga Sveučilišta u Mostaru</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="flowplayer fixed-controls no-toggle no-time play-button obj"
                                        style="    width: 85.5%;
                                    height: 80%;
                                    margin-left: 7.2%;
                                    margin-top: 6%;
                                    z-index: 1000;" data-key="$812975748999788" data-live="true" data-share="false" data-ratio="0.5625"  data-logo="">
                                        <video autoplay="true" stretch="true">

                                        <source type="application/x-mpegurl" src="https://rtmp.smart.sum.ba/stream/sum-meteo-camera/index.m3u8">
                                        </video>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Zatvori</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                </div>
                <!-- /.card-body -->
              </div>
              {{-- KRAJ --}}

            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- ./card-body -->
        <div class="card-footer">
          <div class="row">
            <div class="col-sm-4 col-6">
              <div class="description-block border-right">
                <h5 class="description-percentage text-warning">{{$allEvents}}</h5>
                <span class="description-text">Ukupno događaja na parkinzima</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4 col-6">
              <div class="description-block border-right">
                <h5 class="description-percentage text-warning">{{ $last24h }}</h5>
                <span class="description-text">Broj događaja u zadnja 24 sata</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4 col-6">
              <div class="description-block border-right">
                <h5 class="description-percentage text-warning">{{ $allLots->count() }}</h5>
                <span class="description-text">Ukupan broj parkirnih mjesta</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->

          </div>
          <!-- /.row -->
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
{{-- KRAJ NOVOG --}}

{{-- TABLICA DOGAĐAJA --}}
 <div class="row mt-4">
     <div class="col-md-12">
        <h5>Tablica događaja na parkinzima:</h5>
        <table class="table caption-top">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Parking</th>
                <th scope="col">Broj parkinga</th>
                <th scope="col">Trenutno stanje</th>
                <th scope="col">Dostupno mjesta</th>
                <th scope="col">Zauzeto mjesta</th>
                <th scope="col">Zadnja promjena</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>{{$event->id}}</td>
                        <td>
                            @if($event->id_parking_lot == 1)
                            Sveučilište 1
                        @elseif ($event->id_parking_lot == 2)
                            Sveučilište 2
                        @else
                            Sveučilište 3
                        @endif
                        </td>
                        <td>{{$event->name}}</td>
                        <td>
                            @if($event->occupied == 1)
                                <span class="badge badge-danger">Zauzeto</span>
                            @elseif ($event->occupied == 0)
                                <span class="badge badge-success">Slobodno</span>
                            @endif
                        </td>
                        <td>{{$event->normal_available}}</td>
                        <td>{{$event->normal_occupied}}</td>
                        <td>{{$event->created_at->format('d/m/Y H:i:s')}}</td>
                    </tr>
                @endforeach

            </tbody>
          </table>
          {{ $events->links() }}
     </div>
 </div>
 <!-- JS code -->
<!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
<script src="https://vjs.zencdn.net/ie8/ie8-version/videojs-ie8.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-hls/5.14.1/videojs-contrib-hls.js"></script>
<script src="https://vjs.zencdn.net/7.2.3/video.js"></script>

<script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="//releases.flowplayer.org/7.0.4/commercial/flowplayer.min.js"></script>
<script src="//releases.flowplayer.org/hlsjs/flowplayer.hlsjs.min.js"></script>

<script>
flowplayer(function (api) {
  api.on("load", function (e, api, video) {
    $("#vinfo").text(api.engine.engineName + " engine playing " + video.type);
  }); });
</script>

 <script>
    $(document).ready(function() {
        $("#myBtn").click(function() {
            $("#myModal").modal("show");
        });
    });
    </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>


    <script>
      const socket = io('https://demo.smart.sum.ba/parking-events');
      //Socket IO
      socket.on('connect', function (socket) {
        console.log('Connected to socket server!');
    });
    //


    socket.on('parking-lot-ramp-state-change', function(data){
            console.log(data);
           /*  var id_parking_lot = data.id_parking_lot;

            if(id_parking_lot === 1){
                    document.getElementById("occupied1").innerHTML = JSON.stringify(data.normal_occupied);
        }
            else if(id_parking_lot === 2){
                document.getElementById("occupied2").innerHTML = JSON.stringify(data.normal_occupied);
            }
            else {
                document.getElementById("occupied3").innerHTML = JSON.stringify(data.normal_occupied);
          } */
       });

    </script>
    {!! $chart->renderChartJsLibrary() !!}
    {!! $chart->renderJs() !!}
  </body>
</html>

@endsection

