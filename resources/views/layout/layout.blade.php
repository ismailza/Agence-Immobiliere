<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('assets/bootstrap') }}/css/bootstrap.min.css" />
</head>
<body>
  @php
    $routeName = request()->route();
  @endphp
  <nav class="navbar navbar-expand-lg bg-info mb-2">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('index') }}">Agence</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a @class(['nav-link', 'active' => $routeName->getName() === 'index']) href="{{ route('index') }}">Accueil</a>
          </li>
          <li class="nav-item">
            <a @class(['nav-link', 'active' => $routeName->getName() === 'property.index']) href="{{ route('property.index') }}">Biens</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
  @yield('content')

  <script src="{{ asset('assets/bootstrap') }}/js/bootstrap.min.js"></script>
  <script src="{{ asset('assets/bootstrap') }}/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('assets/jquery') }}/jquery-3.7.0.min.js"></script>
</body>
</html>