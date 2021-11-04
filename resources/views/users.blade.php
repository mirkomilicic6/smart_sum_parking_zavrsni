@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        @if (Session::has('message'))
        <div class="alert alert-warning">
            {{ Session::get('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-12 col-sm-6 col-md-6">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Ukupno registriranih korisnika</span>
                  <span class="info-box-number">{{ $usersCount }}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
              <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-sign-in-alt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Zadnja prijava u sustav</span>
                  <span class="info-box-number">{{ \Carbon\Carbon::parse($lastLogin)->format('d/m/Y H:i:s') }}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-6">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users-cog"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tipovi korisnika:</span>
              <span class="info-box-number">
                  <ul style="list-style-type:none;">
                      <li>
                        <p class="badge badge-pill badge-light">User</p> - nema pristup listi korisnika
                      </li>
                      <li>
                        <p class="badge badge-pill badge-success">Admin</p> - pristup bez izmjene korisnika
                      </li>
                      <li>
                         <p class="badge badge-pill badge-info">Super admin</p> - pristup/izmjena
                      </li>
                  </ul>


              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>


      </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-transparent">
                      <h3 class="card-title">Svi korisnici</h3>

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
                    <div class="card-body p-0">
                      <div class="table-responsive">
                        <table class="table m-0">
                          <thead>
                          <tr>
                            <th>ID</th>
                            <th>Ime</th>
                            <th>Email</th>
                            <th>Tip korisnika</th>
                            <th>Zadnji login na stranici</th>
                            <th>IP adresa</th>
                          </tr>
                          </thead>
                          <tbody>
                              @foreach ($users as $user)
                              @if(Auth::user()->id == $user->id)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{  $user->name}}</td>
                                        <td>{{  $user->email}}</td>
                                        @if($user->user_type == 'super_admin')
                                        <td><a href="#" class="badge badge-pill badge-info">Super admin (trentno ulogirani korisnik)</a></td>
                                        @elseif ($user->user_type == 'admin')
                                            <td><a href="#" class="badge badge-pill badge-success">Admin (trentno ulogirani korisnik)</a></td>
                                        @else
                                        <td><a href="#" class="badge badge-pill badge-light">User (trentno ulogirani korisnik)</a></td>

                                        @endif
                                        <td>{{ $user->last_login_at }}</td>
                                        <td>{{ $user->last_login_ip }}</td>
                                    </tr>
                              @else
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{  $user->name}}</td>
                                    <td>{{  $user->email}}</td>
                                    @if($user->user_type == 'admin')
                                    <td><a href="{{ route('admin.user.toggle', $user->id) }}" class="badge badge-pill badge-success">Admin</a></td>
                                    @elseif($user->user_type == 'super_admin')
                                    <td><a href="#" class="badge badge-pill badge-info">Super admin</a></td>
                                    @else
                                        <td><a href="{{ route('user.user.toggle', $user->id) }}" class="badge badge-pill badge-light">User</a></td>

                                    @endif
                                    <td>{{ $user->last_login_at }}</td>
                                    <td>{{ $user->last_login_ip }}</td>
                                </tr>
                                @endif
                              @endforeach

                          </tbody>
                        </table>
                        {{ $users->links() }}
                      </div>
                      <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->

                  </div>
            </div>
        </div>
    </div>

@endsection
<style>
    .badge badge-primary {
        font-size: 20px;
    }
</style>
