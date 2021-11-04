@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
            {{-- PARKING 3 --}}
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h5 class="card-title">Parking - Sveučilište 3 => tjedna statistika</h5>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>

                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-8">
                    <div class="chart">
                        {!! $chartParking3_tjedna->renderHtml() !!}
                    </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <p>Najpopularnija parkirna mjesta ovaj tjedan:</p>
                            @foreach ($parking3MostPopularParkingThisWeek as $parking3tjedna)
                            <div class="info-box">
                                <span class="info-box-icon bg-danger"><i class="fas fa-car"></i></span>

                                <div class="info-box-content">
                                  <span class="info-box-number">{{$parking3tjedna->parking_space_name}}</span>
                                </div>
                                <!-- /.info-box-content -->
                              </div>
                            @endforeach
                        </div>
                        <div class="icon">
                          <i class="fas fa-chart-pie"></i>
                        </div>

                    </div>
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
                    <h5 class="description-header text-success">{{$parking3weekStats}}</h5>
                    <span class="description-text">Broj događaja na parkingu 3 u zadnjih 7 dana</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-6">
                    <div class="description-block border-right">
                        @if ($parking3weekBeforeStats < 1)
                        <span class="description-percentage text-danger">Trenutno nema traženih podataka </span>
                        @elseif ($parking3weekStats > $parking3weekBeforeStats)
                          <span class="description-percentage text-success"><i class="fas fa-caret-up"></i>
                              {{round((($parking3weekStats-$parking3weekBeforeStats)/$parking3weekBeforeStats)*100, 2)}}%
                          </span>
                        @elseif ($parking3weekStats < $parking3weekBeforeStats)
                          <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i>
                            {{round((($parking3weekBeforeStats-$parking3weekStats)/$parking3weekBeforeStats)*100, 2)}}%
                        </span>
                        @endif
                      <h5 class="description-header">{{$parking3weekBeforeStats}}</h5>
                      <span class="description-text">USPOREDBA S TJEDNOM PRIJE OVOG</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                <div class="col-sm-4 col-6">
                  <div class="description-block border-right">
                    <h5 class="description-header text-warning">{{$parking3percentage7days}}%</h5>
                    <span class="description-text">Postotak događaja na parkingu 3 od ukupno događaja u zadnjih 7 dana</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->


              </div>
              <!-- /.row -->
            </div>
            <!-- /.card-footer -->
          </div>
    </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
        <div class="card-header">
          <h5 class="card-title">Parking - Sveučilište 3 => mjesečna statistika</h5>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>

            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-8">
                <div class="chart">
                    {!! $chartParking3_mjesecna->renderHtml() !!}
                </div>
              <!-- /.chart-responsive -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <p>Najpopularnija parkirna mjesta ovaj mjesec:</p>
                        @foreach ($parking3MostPopularParkingsThisMonth as $parking3mjesecna)
                        <div class="info-box">
                            <span class="info-box-icon bg-danger"><i class="fas fa-car"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-number">{{$parking3mjesecna->parking_space_name}}</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                        @endforeach
                    </div>
                    <div class="icon">
                      <i class="fas fa-chart-pie"></i>
                    </div>

                </div>
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
                <h5 class="description-header text-success">{{$parking3thisMonthStats}}</h5>
                <span class="description-text">Broj događaja na parkingu 3 u zadnjih mjesec dana</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4 col-6">
                <div class="description-block border-right">
                    @if ($parking3lastMonthStats < 1)
                        <span class="description-percentage text-danger">Trenutno nema traženih podataka </span>
                    @elseif ($parking3thisMonthStats > $parking3lastMonthStats)
                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i>
                          {{round((($parking3thisMonthStats-$parking3lastMonthStats)/$parking3lastMonthStats)*100, 2)}}%
                      </span>
                    @elseif ($parking3thisMonthStats < $parking3lastMonthStats)
                      <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i>
                        {{round((($parking3lastMonthStats-$parking3thisMonthStats)/$parking3lastMonthStats)*100, 2)}}%
                    </span>
                    @endif
                  <h5 class="description-header">{{$parking3lastMonthStats}}</h5>
                  <span class="description-text">USPOREDBA S MJESECOM PRIJE OVOG</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
            <div class="col-sm-4 col-6">
              <div class="description-block border-right">
                <h5 class="description-header text-warning">{{$parking3percentage30days}}%</h5>
                <span class="description-text">Postotak događaja na parkingu 3 od ukupno događaja u zadnjih 30 dana</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->


          </div>
          <!-- /.row -->
        </div>
        <!-- /.card-footer -->
      </div>
  </div>
</div>

{{--  PARKING 3 UKUPNA STATISTIKA --}}
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h5 class="card-title">Parking - Sveučilište 3 => ukupna statistika</h5>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>

                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-8">
                    <div class="chart">
                        {!! $chartParking3_ukupna->renderHtml() !!}
                    </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <p>Najpopularnija parkirna mjesta ukupno:</p>
                            @foreach ($parking3MostPopularAllTime as $parking3ukupno)
                            <div class="info-box">
                                <span class="info-box-icon bg-danger"><i class="fas fa-car"></i></span>

                                <div class="info-box-content">
                                  <span class="info-box-number">{{$parking3ukupno->parking_space_name}}</span>
                                </div>
                                <!-- /.info-box-content -->
                              </div>
                            @endforeach
                        </div>
                        <div class="icon">
                          <i class="fas fa-chart-pie"></i>
                        </div>

                    </div>
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
                    <h5 class="description-header text-success">{{$parking3UkupnoStats}}</h5>
                    <span class="description-text">Broj događaja na parkingu 3 ukupno</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-6">
                    <div class="description-block border-right">
                        @if ($parking3LastYear < 1)
                        <span class="description-percentage text-danger">Trenutno nema traženih podataka </span>

                        @elseif ($parking3ThisYear > $parking3LastYear)
                          <span class="description-percentage text-success"><i class="fas fa-caret-up"></i>
                              {{round((($parking3ThisYear-$parking3LastYear)/$parking3LastYear)*100, 2)}}%
                          </span>
                        @elseif ($parking3ThisYear < $parking3LastYear)
                          <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i>
                            {{round((($parking3LastYear-$parking3ThisYear)/$parking3LastYear)*100, 2)}}%
                        </span>
                        @endif
                      <h5 class="description-header">{{$parking3LastYear}}</h5>
                      <span class="description-text">USPOREDBA S GODINOM PRIJE</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                <div class="col-sm-4 col-6">
                  <div class="description-block border-right">
                    <h5 class="description-header text-warning">{{$parking3percentageUkupno}}%</h5>
                    <span class="description-text">Postotak događaja na parkingu 3 od ukupno događaja</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->


              </div>
              <!-- /.row -->
            </div>
            <!-- /.card-footer -->
          </div>
    </div>
</div>
    </div>

    {{-- TJEDNA STATISTIKA PARKING 3 --}}
{!! $chartParking3_tjedna->renderChartJsLibrary() !!}
{!! $chartParking3_tjedna->renderJs() !!}
{{-- TJEDNA STATISTIKA PARKING 3 --}}
{!! $chartParking3_mjesecna->renderChartJsLibrary() !!}
{!! $chartParking3_mjesecna->renderJs() !!}
{{-- UKUPNA STATISTIKA PARKING 3 --}}
{!! $chartParking3_ukupna->renderChartJsLibrary() !!}
{!! $chartParking3_ukupna->renderJs() !!}
@endsection
