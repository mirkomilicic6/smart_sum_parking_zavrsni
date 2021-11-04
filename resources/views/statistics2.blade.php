@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    {{-- PARKING 1 --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card collapsed-card">
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
                            @if ($parking1weekStats > $parking1weekBeforeStats)
                              <span class="description-percentage text-success"><i class="fas fa-caret-up"></i>
                                  {{round((($parking1weekStats-$parking1weekBeforeStats)/$parking1weekBeforeStats)*100, 2)}}%
                              </span>
                            @elseif ($parking1weekStats < $parking1weekBeforeStats)
                              <span class="description-percentage text-success"><i class="fas fa-caret-down"></i>
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
  <div class="row">
      <div class="col-md-12">
        <div class="card collapsed-card">
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
                        @if ($parking1thisMonthStats > $parking1lastMonthStats)
                          <span class="description-percentage text-success"><i class="fas fa-caret-up"></i>
                              {{round((($parking1thisMonthStats-$parking1lastMonthStats)/$parking1lastMonthStats)*100, 2)}}%
                          </span>
                        @elseif ($parking1thisMonthStats < $parking1lastMonthStats)
                          <span class="description-percentage text-success"><i class="fas fa-caret-down"></i>
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

  {{-- PARKING 2 --}}
  <div class="row">
    <div class="col-md-12">
        <div class="card collapsed-card">
            <div class="card-header">
              <h5 class="card-title">Parking - Sveučilište 2 => tjedna statistika</h5>

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
                        {!! $chartParking2_tjedna->renderHtml() !!}
                    </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <p>Najpopularnija parkirna mjesta ovaj tjedan:</p>
                            @foreach ($parking2MostPopularParkingThisWeek as $parking2tjedna)
                            <div class="info-box">
                                <span class="info-box-icon bg-danger"><i class="fas fa-car"></i></span>

                                <div class="info-box-content">
                                  <span class="info-box-number">{{$parking2tjedna->parking_space_name}}</span>
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
                    <h5 class="description-header text-success">{{$parking2weekStats}}</h5>
                    <span class="description-text">Broj događaja na parkingu 2 u zadnjih 7 dana</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-6">
                    <div class="description-block border-right">
                        @if ($parking2weekStats > $parking2weekBeforeStats)
                          <span class="description-percentage text-success"><i class="fas fa-caret-up"></i>
                              {{round((($parking2weekStats-$parking2weekBeforeStats)/$parking2weekBeforeStats)*100, 2)}}%
                          </span>
                        @elseif ($parking2weekStats < $parking2weekBeforeStats)
                          <span class="description-percentage text-success"><i class="fas fa-caret-down"></i>
                            {{round((($parking2weekBeforeStats-$parking2weekStats)/$parking2weekBeforeStats)*100, 2)}}%
                        </span>
                        @endif
                      <h5 class="description-header">{{$parking2weekBeforeStats}}</h5>
                      <span class="description-text">USPOREDBA S TJEDNOM PRIJE OVOG</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                <div class="col-sm-4 col-6">
                  <div class="description-block border-right">
                    <h5 class="description-header text-warning">{{$parking2percentage7days}}%</h5>
                    <span class="description-text">Postotak događaja na parkingu 2 od ukupno događaja u zadnjih 7 dana</span>
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
    <div class="card collapsed-card">
        <div class="card-header">
          <h5 class="card-title">Parking - Sveučilište 2 => mjesečna statistika</h5>

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
                    {!! $chartParking2_mjesecna->renderHtml() !!}
                </div>
              <!-- /.chart-responsive -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <p>Najpopularnija parkirna mjesta ovaj mjesec:</p>
                        @foreach ($parking2MostPopularParkingsThisMonth as $parking2mjesecna)
                        <div class="info-box">
                            <span class="info-box-icon bg-danger"><i class="fas fa-car"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-number">{{$parking2mjesecna->parking_space_name}}</span>
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
                <h5 class="description-header text-success">{{$parking2thisMonthStats}}</h5>
                <span class="description-text">Broj događaja na parkingu 2 u zadnjih mjesec dana</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4 col-6">
                <div class="description-block border-right">
                    @if ($parking2thisMonthStats > $parking2lastMonthStats)
                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i>
                          {{round((($parking2thisMonthStats-$parking2lastMonthStats)/$parking2lastMonthStats)*100, 2)}}%
                      </span>
                    @elseif ($parking2thisMonthStats < $parking2lastMonthStats)
                      <span class="description-percentage text-success"><i class="fas fa-caret-down"></i>
                        {{round((($parking2lastMonthStats-$parking2thisMonthStats)/$parking2lastMonthStats)*100, 2)}}%
                    </span>
                    @endif
                  <h5 class="description-header">{{$parking2lastMonthStats}}</h5>
                  <span class="description-text">USPOREDBA S MJESECOM PRIJE OVOG</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
            <div class="col-sm-4 col-6">
              <div class="description-block border-right">
                <h5 class="description-header text-warning">{{$parking2percentage30days}}%</h5>
                <span class="description-text">Postotak događaja na parkingu 2 od ukupno događaja u zadnjih 30 dana</span>
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

{{-- PARKING 3 --}}
<div class="row">
    <div class="col-md-12">
        <div class="card collapsed-card">
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
                        @if ($parking3weekStats > $parking3weekBeforeStats)
                          <span class="description-percentage text-success"><i class="fas fa-caret-up"></i>
                              {{round((($parking3weekStats-$parking3weekBeforeStats)/$parking3weekBeforeStats)*100, 2)}}%
                          </span>
                        @elseif ($parking3weekStats < $parking3weekBeforeStats)
                          <span class="description-percentage text-success"><i class="fas fa-caret-down"></i>
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
    <div class="card collapsed-card">
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
                    @if ($parking3thisMonthStats > $parking3lastMonthStats)
                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i>
                          {{round((($parking3thisMonthStats-$parking3lastMonthStats)/$parking3lastMonthStats)*100, 2)}}%
                      </span>
                    @elseif ($parking3thisMonthStats < $parking3lastMonthStats)
                      <span class="description-percentage text-success"><i class="fas fa-caret-down"></i>
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

</div>

{{-- TJEDNA STATISTIKA PARKING 1 --}}
{!! $chartParking1_tjedna->renderChartJsLibrary() !!}
{!! $chartParking1_tjedna->renderJs() !!}
{{-- TJEDNA STATISTIKA PARKING 1 --}}
{!! $chartParking1_mjesecna->renderChartJsLibrary() !!}
{!! $chartParking1_mjesecna->renderJs() !!}

{{-- TJEDNA STATISTIKA PARKING 2 --}}
{!! $chartParking2_tjedna->renderChartJsLibrary() !!}
{!! $chartParking2_tjedna->renderJs() !!}
{{-- TJEDNA STATISTIKA PARKING 2 --}}
{!! $chartParking2_mjesecna->renderChartJsLibrary() !!}
{!! $chartParking2_mjesecna->renderJs() !!}

{{-- TJEDNA STATISTIKA PARKING 3 --}}
{!! $chartParking3_tjedna->renderChartJsLibrary() !!}
{!! $chartParking3_tjedna->renderJs() !!}
{{-- TJEDNA STATISTIKA PARKING 3 --}}
{!! $chartParking3_mjesecna->renderChartJsLibrary() !!}
{!! $chartParking3_mjesecna->renderJs() !!}
@endsection
