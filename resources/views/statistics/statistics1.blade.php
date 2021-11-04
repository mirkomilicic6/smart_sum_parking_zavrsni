@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
           {{-- PARKING 1 --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Parking - Sveučilište 1 => tjedna statistika</h5>

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
                            {!! $chartParking1_tjedna->renderHtml() !!}
                        </div>
                      <!-- /.chart-responsive -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <p>Najpopularnija parkirna mjesta ovaj tjedan:</p>
                                @foreach ($parking1MostPopularParkingThisWeek as $parking1tjedna)
                                <div class="info-box">
                                    <span class="info-box-icon bg-danger"><i class="fas fa-car"></i></span>

                                    <div class="info-box-content">
                                      <span class="info-box-number">{{$parking1tjedna->parking_space_name}}</span>
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
                        <h5 class="description-header text-success">{{$parking1weekStats}}</h5>
                        <span class="description-text">Broj događaja na parkingu 1 u zadnjih 7 dana</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 col-6">
                        <div class="description-block border-right">
                            @if ($parking1weekBeforeStats < 1)
                        <span class="description-percentage text-danger">Trenutno nema traženih podataka </span>
                            @elseif ($parking1weekStats > $parking1weekBeforeStats)
                              <span class="description-percentage text-success"><i class="fas fa-caret-up"></i>
                                  {{round((($parking1weekStats-$parking1weekBeforeStats)/$parking1weekBeforeStats)*100, 2)}}%
                              </span>
                            @elseif ($parking1weekStats < $parking1weekBeforeStats)
                              <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i>
                                {{round((($parking1weekBeforeStats-$parking1weekStats)/$parking1weekBeforeStats)*100, 2)}}%
                            </span>
                            @endif
                          <h5 class="description-header">{{$parking1weekBeforeStats}}</h5>
                          <span class="description-text">USPOREDBA S TJEDNOM PRIJE OVOG</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                    <div class="col-sm-4 col-6">
                      <div class="description-block border-right">
                        <h5 class="description-header text-warning">{{$parking1percentage7days}}%</h5>
                        <span class="description-text">Postotak događaja na parkingu 1 od ukupno događaja u zadnjih 7 dana</span>
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
  {{-- UKUPNA STATISTIKA --}}
  <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h5 class="card-title">Parking - Sveučilište 1 => mjesečna statistika</h5>

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
                        {!! $chartParking1_mjesecna->renderHtml() !!}
                    </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <p>Najpopularnija parkirna mjesta ovaj mjesec:</p>
                            @foreach ($parking1MostPopularParkingsThisMonth as $parking1mjesecna)
                            <div class="info-box">
                                <span class="info-box-icon bg-danger"><i class="fas fa-car"></i></span>

                                <div class="info-box-content">
                                  <span class="info-box-number">{{$parking1mjesecna->parking_space_name}}</span>
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
                    <h5 class="description-header text-success">{{$parking1thisMonthStats}}</h5>
                    <span class="description-text">Broj događaja na parkingu 1 u zadnjih mjesec dana</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-6">
                    <div class="description-block border-right">
                        @if ($parking1lastMonthStats < 1)
                        <span class="description-percentage text-danger">Trenutno nema traženih podataka </span>
                        @elseif ($parking1thisMonthStats > $parking1lastMonthStats)
                          <span class="description-percentage text-success"><i class="fas fa-caret-up"></i>
                              {{round((($parking1thisMonthStats-$parking1lastMonthStats)/$parking1lastMonthStats)*100, 2)}}%
                          </span>
                        @elseif ($parking1thisMonthStats < $parking1lastMonthStats)
                          <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i>
                            {{round((($parking1lastMonthStats-$parking1thisMonthStats)/$parking1lastMonthStats)*100, 2)}}%
                        </span>
                        @endif
                      <h5 class="description-header">{{$parking1lastMonthStats}}</h5>
                      <span class="description-text">USPOREDBA S MJESECOM PRIJE OVOG</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                <div class="col-sm-4 col-6">
                  <div class="description-block border-right">
                    <h5 class="description-header text-warning">{{$parking1percentage30days}}%</h5>
                    <span class="description-text">Postotak događaja na parkingu 1 od ukupno događaja u zadnjih 30 dana</span>
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

{{--  PARKING 1 UKUPNA STATISTIKA --}}
  <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h5 class="card-title">Parking - Sveučilište 1 => ukupna statistika</h5>

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
                        {!! $chartParking1_ukupna->renderHtml() !!}
                    </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <p>Najpopularnija parkirna mjesta ukupno:</p>
                            @foreach ($parking1MostPopularAllTime as $parking1ukupno)
                            <div class="info-box">
                                <span class="info-box-icon bg-danger"><i class="fas fa-car"></i></span>

                                <div class="info-box-content">
                                  <span class="info-box-number">{{$parking1ukupno->parking_space_name}}</span>
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
                    <h5 class="description-header text-success">{{$parking1UkupnoStats}}</h5>
                    <span class="description-text">Broj događaja na parkingu 1 ukupno</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-6">
                    <div class="description-block border-right">
                        @if ($parking1LastYear < 1)
                        <span class="description-percentage text-danger">Trenutno nema traženih podataka </span>
                        @elseif ($parking1ThisYear > $parking1LastYear)
                          <span class="description-percentage text-success"><i class="fas fa-caret-up"></i>
                              {{round((($parking1ThisYear-$parking1LastYear)/$parking1LastYear)*100, 2)}}%
                          </span>
                        @elseif ($parking1ThisYear < $parking1LastYear)
                          <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i>
                            {{round((($parking1LastYear-$parking1ThisYear)/$parking1LastYear)*100, 2)}}%
                        </span>
                        @endif
                      <h5 class="description-header">{{$parking1LastYear}}</h5>
                      <span class="description-text">USPOREDBA S GODINOM PRIJE</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                <div class="col-sm-4 col-6">
                  <div class="description-block border-right">
                    <h5 class="description-header text-warning">{{$parking1percentageUkupno}}%</h5>
                    <span class="description-text">Postotak događaja na parkingu 1 od ukupno događaja</span>
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
    {{-- TJEDNA STATISTIKA PARKING 1 --}}
{!! $chartParking1_tjedna->renderChartJsLibrary() !!}
{!! $chartParking1_tjedna->renderJs() !!}
{{-- MJESEČNA STATISTIKA PARKING 1 --}}
{!! $chartParking1_mjesecna->renderChartJsLibrary() !!}
{!! $chartParking1_mjesecna->renderJs() !!}
{{-- UKUPNA STATISTIKA PARKING 1 --}}
{!! $chartParking1_ukupna->renderChartJsLibrary() !!}
{!! $chartParking1_ukupna->renderJs() !!}

@endsection
