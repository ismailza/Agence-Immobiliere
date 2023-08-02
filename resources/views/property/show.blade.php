@extends('layout.layout')

@section('title', "$property->title | IZ")

@section('content')

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-8">
        <div id="carouselExampleAutoplaying" class="carousel slide h-100" data-bs-ride="carousel">
          <div class="carousel-inner h-100">
            @forelse ($property->pictures()->get() as $picture)
            <div class="carousel-item active h-100">
              <img src="{{ $picture->pictureUrl() }}" class="d-block w-100 h-100 object-fit-cover">
            </div>
            @empty
            <div class="carousel-item active h-100">
              <img src="{{ asset('storage/images/default.png') }}" class="d-block w-100 h-100 object-fit-cover" alt="">
            </div>
            @endforelse
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <div class="col-md-4">
        <h2>{{ $property->title }}</h2>
        <h3>{{ $property->surface }} m² - {{ $property->rooms }} pièces</h3>

        <div class="text-primary fw-bold fs-2">{{ number_format(num:$property->price, decimals:2, thousands_separator:' ') }} DH</div>
        <hr>
        <div class="mt-4">
          <h4>Intéressé par ce bien?</h4>
          @if (session('success'))
            <x-alert>{{ session('success') }}</x-alert>
          @endif
          <form class="vstack gap-2" action="{{ route('property.contact', $property) }}" method="post">
            @csrf
            <div class="row">
              <x-input class="col" label="Prénom" name="firstname" placeholder="Votre prénom" />
              <x-input class="col" label="Nom" name="lastname" placeholder="Votre nom" />
            </div>
            <div class="row">
              <x-input class="col" label="Télephone" name="phone" placeholder="Votre télephone" />
              <x-input class="col" type="email" label="Email" name="email" placeholder="Votre email" />
            </div>
            <x-input class="col" type="textarea" label="Votre message" name="message" />
            <div>
              <button class="btn btn-primary">Envoyer</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <hr>
    <div class="mt-4">
      <p>{!! nl2br($property->description) !!}</p>
      <div class="row">
        <div class="col-8">
          <h2>Caractéristiques</h2>
          <table class="table table-stripped">
            <tr>
              <td>Surface</td>
              <td>{{ $property->surface }} m²</td>
            </tr>
            <tr>
              <td>Pièces</td>
              <td>{{ $property->rooms }}</td>
            </tr>
            <tr>
              <td>Chambres</td>
              <td>{{ $property->bedrooms }}</td>
            </tr>
            <tr>
              <td>Etage</td>
              <td>{{ $property->floor ?: 'Rez de chaussé' }}</td>
            </tr>
            <tr>
              <td>Localisation</td>
              <td>{{ $property->address }}, {{ $property->city }} ({{ $property->postal_code }})</td>
            </tr>
          </table>
        </div>
        <div class="col-4">
          <h2>Spécéficités</h2>
          <ul class="list-group">
            @forelse ($property->options as $option)
              <li class="list-group-item">{{ $option->name }}</li>
            @empty
              <p class="text-secendary text-center">Pas de spécéficités pour ce bien</p>
            @endforelse
          </ul>
        </div>
      </div>
    </div>
  </div>
  
@endsection