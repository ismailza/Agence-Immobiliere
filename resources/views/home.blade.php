@extends('layout.layout')

@section('title', 'Accueil')

@section('content')
  <div class="bg-light p-5 mb-5 text-center">
    <div class="container">
      <h1>Agence Immobilière IZ</h1>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi accusantium culpa ratione, laboriosam recusandae dolor sunt nihil deserunt unde perferendis quis, animi, ad in sequi asperiores nam provident commodi cumque!
      </p>
    </div>
  </div>

  <div class="container">
    <h2>Nos dérniers biens</h2>
    <div class="row">
      @foreach ($properties as $property)
        <div class="col">
          @include('property.card')
        </div>
      @endforeach
    </div>
  </div>
@endsection