@extends('layouts.admin')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-md-12">
        <div class="info-box bg-primary">
            <span class="info-box-icon"><i class="fas fa-car"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Parking 1</span>
              <span class="info-box-number">Zauzeto {{$parking1count}} od {{$parking1->capacity}} parkirnih mjesta</span>

              <div class="progress">
                <div class="progress-bar" style="width: {{$parking1count / $parking1->capacity * 100}}%"></div>
              </div>
              <span class="progress-description">
                Zadnje ažurirano {{$parking1latest->created_at->format('d/m/Y H:i:s')}}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
    </div>
</div>
<div class="row ml-4">
    <div class="col-md-6">
        <div class="chart">
            <!-- Sales Chart Canvas -->
            {!! $chart2->renderHtml() !!}
        </div>
          <!-- /.chart-responsive -->
    </div>

    <div class="col-md-6">
        <div class="chart">
            <!-- Sales Chart Canvas -->
            {!! $chartParking1->renderHtml() !!}
        </div>
          <!-- /.chart-responsive -->
    </div>
</div>



    <div class="ml-4">
        <h4>Trenutno stanje na parkingu</h4>
    </div>
    <div class="row ml-4 mb-4">
            @foreach ($parking1lots as $lot1)
                <div class="col-sm-3">
                    <div class="card card-primary collapsed-card">
                        @if($lot1->occupied === 1)
                        <div class="card-header" style="background-color: red;">
                          <h3 class="card-title">Parking broj: {{ $lot1->parking_space_name }}</h3>
                          @else
                          <div class="card-header" style="background-color: green;">
                            <h3 class="card-title">Parking broj: {{ $lot1->parking_space_name }}</h3>
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
                                @if ($lot1->occupied == 1)
                                    <span class="badge badge-danger">Zauzeto</span>
                                @else
                                    <span class="badge badge-success">Slobodno</span>
                                @endif
                            </p>
                            <p>Naziv parkinga: {{ $parking1->name }} </p>
                            <p>Dostupno mjesta: {{ $parking1->capacity - $parking1count }}</p>
                            <p>Zauzeto mjesta: {{ $parking1count }}</p>
                          <p>Zadnji događaj na senzoru: {{ $lot1->updated_at->format('d/m/Y H:i:s') }}</p>
                          <p>Lokacija:</p>
                          <iframe
                                width="250"
                                height="250"
                                frameborder="0" style="border:0"
                                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAkwf4tCg5Z4J0a-cCZ9Bk2ZfCf_IwSwA8&q={{ $lot1->lat }},{{ $lot1->lng }}&maptype=satellite&zoom=17" allowfullscreen>
                        </iframe>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->

                </div>
            @endforeach

    </div>
</div>

    {!! $chart2->renderChartJsLibrary() !!}
    {!! $chart2->renderJs() !!}

    {!! $chartParking1->renderChartJsLibrary() !!}
    {!! $chartParking1->renderJs() !!}
@endsection
