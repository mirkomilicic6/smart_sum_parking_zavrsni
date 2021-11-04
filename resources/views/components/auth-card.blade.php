<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-8 d-none d-md-flex bg-image"></div>


            <!-- The content half -->
            <div class="col-md-4 bg-light">
                <div class="login d-flex align-items-center py-5">

                    <!-- Demo content-->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-xl-7 mx-auto">
                                <div class="display-6">Administratorske stranice pametnog parkinga na Sveučilištu u Mostaru</div>
                                <p class="text-muted mb-4">Stranicama mogu pristupiti samo registrirani korisnici</p>
                                {{ $slot }}
                            </div>
                            <div>
                                <div class="col-lg-10 col-xl-7 mx-auto mt-4">
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                                        {{ __('Nemate račun? Kliknite ovdje za registraciju!') }}
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div><!-- End -->

                </div>
            </div><!-- End -->

        </div>
    </div>
</body>
<style>
    .login,
.image {
  min-height: 100vh;
}

.bg-image {
  background-image: url('images/login_fpmoz.png');
  background-size: cover;
  background-position: center center;

}
</style>
</html>
{{-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
 --}}
