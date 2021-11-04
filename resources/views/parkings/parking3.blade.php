@extends('layouts.admin')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-md-12">
        <div class="info-box bg-success">
            <span class="info-box-icon"><i class="fas fa-car"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Parking 3</span>
              <span class="info-box-number">Zauzeto {{$parking3count}} od {{$parking3->capacity}} parkirnih mjesta</span>

              <div class="progress">
                <div class="progress-bar" style="width: {{$parking3count / $parking3->capacity * 100}}%"></div>
              </div>
              <span class="progress-description">
                Zadnje ažurirano {{$parking3latest->created_at->format('d/m/Y H:i:s')}}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="chart">
            <!-- Sales Chart Canvas -->
            {!! $chartParking3->renderHtml() !!}
        </div>
          <!-- /.chart-responsive -->
    </div>

    <div class="col-md-6">
        <div class="chart">
            <!-- Sales Chart Canvas -->
            {!! $chartParking3_1->renderHtml() !!}
        </div>
          <!-- /.chart-responsive -->
    </div>
</div>



    <div class="ml-4">
        <h4>Trenutno stanje na parkingu</h4>
    </div>
    <div class="row ml-4 mb-4">
            @foreach ($parking3lots as $lot3)
                <div class="col-sm-3">
                    <div class="card card-primary collapsed-card">
                        @if($lot3->occupied === 1)
                        <div class="card-header" style="background-color: red;">
                          <h3 class="card-title">Parking broj: {{ $lot3->parking_space_name }}</h3>
                          @else
                          <div class="card-header" style="background-color: green;">
                            <h3 class="card-title">Parking broj: {{ $lot3->parking_space_name }}</h3>
                          @endif
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                            </button>
                          </div>
                          <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <p>Stanje parkinga:
                                @if ($lot3->occupied == 1)
                                    <span class="badge badge-danger">Zauzeto</span>
                                @else
                                    <span class="badge badge-success">Slobodno</span>
                                @endif
                            </p>
                            <p>Naziv parkinga: {{ $parking3->name }} </p>
                            <p>Dostupno mjesta: {{ $parking3->capacity - $parking3count }}</p>
                            <p>Zauzeto mjesta: {{ $parking3count }}</p>
                          <p>Zadnji događaj na senzoru: {{ $lot3->updated_at->format('d/m/Y H:i:s') }}</p>
                          <p>Lokacija:</p>
                          <iframe
                                width="250"
                                height="250"
                                frameborder="0" style="border:0"
                                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAkwf4tCg5Z4J0a-cCZ9Bk2ZfCf_IwSwA8&q={{ $lot3->lat }},{{ $lot3->lng }}&maptype=satellite&zoom=17" allowfullscreen>
                        </iframe>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->

                </div>
            @endforeach

    </div>
    </div>
    {!! $chartParking3->renderChartJsLibrary() !!}
    {!! $chartParking3->renderJs() !!}

    {!! $chartParking3_1->renderChartJsLibrary() !!}
    {!! $chartParking3_1->renderJs() !!}
@endsection
