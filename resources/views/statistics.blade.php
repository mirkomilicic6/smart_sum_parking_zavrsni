@extends('layouts.admin')

@section('content')
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<link href="{{ asset(mix('app.css', 'vendor/model-stats')) }}" rel="stylesheet" type="text/css">

                    <router-view></router-view>

    <!-- Global ModelStats Object -->
    <script>
        window.ModelStats = {
            config: @json($config),
            models: @json($models)
        }
    </script>

    <script src="{{ asset(mix('app.js', 'vendor/model-stats')) }}"></script>@endsection
