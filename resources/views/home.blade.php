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

  </head>
  <body>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        </div>
      <div class="container">
      <div class="row">
                <div class="col-md-4">
                    <h3>{{ $parking1->name }}</h3>
                    <p>Zauzeto
                        <div id="occupied1"></div>
                    od {{ $parking1->capacity }} mjesta</p>
                </div>

                <div class="col-md-4">
                    <h3>{{ $parking2->name }}</h3>
                    <p>Zauzeto</p>
                    <p> <div id="occupied2"></div></p>
                    <p> od {{ $parking2->capacity }} parkinga</p>
                </div>

                <div class="col-md-4">
                    <h3>{{ $parking3->name }}</h3>
                    <p>Zauzeto</p>
                    <p><div id="occupied3"></div></p>
                    <p> od {{ $parking3->capacity }} parkinga</p>
                </div>
      </div>
      <hr>
      <p>{{ $parking1->name }}</p>
      <div class="row">
              @foreach ($parking1lots as $lot1)
              <div class="col-sm-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            @if($lot1->occupied == 1)
                        <h5 class="card-title" style="background-color:red;">{{ $lot1->parking_space_name }}</h5>
                        @else
                        <h5 class="card-title" style="background-color:powderblue;">{{ $lot1->parking_space_name }}</h5>
                        @endif
                        </div>
                    </div>
                </div>
              @endforeach
      </div>
      <p>{{ $parking2->name }}</p>
      <div class="row">
              @foreach ($parking2lots as $lot2)
              <div class="col-sm-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            @if($lot2->occupied == 1)
                        <h5 class="card-title" style="background-color:red;">{{ $lot2->parking_space_name }}</h5>
                        @else
                        <h5 class="card-title" style="background-color:powderblue;">{{ $lot2->parking_space_name }}</h5>
                        @endif
                        </div>
                    </div>
                </div>
              @endforeach
      </div>

      <p>{{ $parking3->name }}</p>
      <div class="row">
              @foreach ($parking3lots as $lot3)
              <div class="col-sm-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            @if($lot3->occupied == 1)
                        <h5 class="card-title" style="background-color:red;">{{ $lot3->parking_space_name }}</h5>
                        @else
                        <h5 class="card-title" style="background-color:powderblue;">{{ $lot3->parking_space_name }}</h5>
                        @endif
                        </div>
                    </div>
                </div>
              @endforeach
      </div>



      </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>


    <script>
      const socket = io('https://demo.smart.sum.ba/parking-events');
      //Socket IO
      socket.on('connection', () => {
        console.log('Connected to server!');
    });
    //


    socket.on('parking-lot-ramp-state-change', function(data){
            console.log(data);
            var id_parking_lot = data.id_parking_lot;

            if(id_parking_lot === 1){
                    document.getElementById("occupied1").innerHTML = JSON.stringify(data.normal_occupied);
        }
            else if(id_parking_lot === 2){
                document.getElementById("occupied2").innerHTML = JSON.stringify(data.normal_occupied);
            }
            else {
                document.getElementById("occupied3").innerHTML = JSON.stringify(data.normal_occupied);
          }
       });

    </script>
  </body>
</html>
