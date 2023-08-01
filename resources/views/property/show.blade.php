@extends('layout.layout')

@section('title', "$property->title | IZ")

@section('content')

  <div class="container">
    <h2>{{ $property->title }}</h2>
    <h3>{{ $property->surface }} m² - {{ $property->rooms }} pièces</h3>

    <div class="text-primary fw-bold fs-2">{{ number_format(num:$property->price, decimals:2, thousands_separator:' ') }} DH</div>
    <hr>
    <div class="mt-4">
      <h4>Intéressé par ce bien?</h4>
      @include('shared.alerts')
      <form class="vstack gap-2" action="{{ route('property.contact', $property) }}" method="post">
        @csrf
        <div class="row">
          @include('shared.input', ['class'=>'col','label'=>'Prénom','name'=>'firstname'])
          @include('shared.input', ['class'=>'col','label'=>'NOM','name'=>'lastname'])
        </div>
        <div class="row">
          @include('shared.input', ['class'=>'col','label'=>'Télephone','name'=>'phone'])
          @include('shared.input', ['class'=>'col','type'=>'email','label'=>'Email','name'=>'email'])
        </div>
        @include('shared.input', ['class'=>'col','type'=>'textarea','label'=>'Votre message','name'=>'message'])
        <div>
          <button class="btn btn-primary">Envoyer</button>
        </div>
      </form>
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