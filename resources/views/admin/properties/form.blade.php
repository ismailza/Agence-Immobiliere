@extends('layout.admin')

@section('title', $property->exists ? 'Editer le bien' : 'Ajouter un bien')

@section('content')
    <h4>@yield('title')</h4>

    <form class="row" action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property) }}" method="post" enctype="multipart/form-data">
      @method($property->exists ? 'put' : 'post')
      @csrf
      
      <x-input class="col-md-6" name="title" :value="$property->title" label="Titre" />
      <x-input class="col-md-3" type="number" name="surface" :value="$property->surface" label="Surface" />
      <x-input class="col-md-3" name="price" :value="$property->price" label="Prix" />
      <x-input type="textarea" name="description" :value="$property->description" />
      <x-input class="col-md-3" type="number" name="rooms" :value="$property->rooms" label="Pièces" />
      <x-input class="col-md-3" type="number" name="bedrooms" :value="$property->bedrooms" label="Chambres" />
      <x-input class="col-md-3" type="number" name="floor" :value="$property->floor" label="Etage" />
      <x-input class="col-md-6" name="address" :value="$property->address" label="Adresse" />
      <x-input class="col-md-3" name="city" :value="$property->city" label="Ville" />
      <x-input class="col-md-3" name="postal_code" :value="$property->postal_code" label="Code postal" />
      <x-checkbox class="m-3" name="sold" label="Vendu" :value="$property->sold" />
      <x-select class="col-md-12" name="options" :value="$property->options()->pluck('id')" :options="$options" multiple="true" />
      <x-input class="col-md-12" name="pictures" label="Images" type="file" multiple/>
      <div class="d-flex justify-content-center">
        @if (request()->route()->getName() === 'admin.property.edit')
          <button type="submit" class="btn btn-warning m-2">Modifier</button>
          <a href="{{ route('admin.property.index') }}" class="btn btn-secondary m-2">Annuler</a>
        @else
          <button type="submit" class="btn btn-primary m-2">Enregistrer</button>
          <button type="reset" class="btn btn-secondary m-2">Annuler</button>
        @endif
      </div>
    </form>

@endsection