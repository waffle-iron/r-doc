<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>r-doc</title>

  <!-- Styles -->
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">

  <!-- Scripts -->
  <script>
    window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' => Auth::check(),
        ]) !!};
  </script>
</head>
<body>

<div id="app">
  <router-view></router-view>
</div>

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>