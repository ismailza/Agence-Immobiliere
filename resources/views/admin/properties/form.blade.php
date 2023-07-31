@extends('layout.admin')

@section('title', $property->exists ? 'Editer le bien' : 'Ajouter un bien')

@section('content')
    <h4>@yield('title')</h4>

    <form class="row" action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property) }}" method="post" enctype="multipart/form-data">
      @method($property->exists ? 'put' : 'post')
      @csrf
      
      @include('shared.input', ['class'=>'col-md-6','label'=>'Titre','name'=>'title','value'=> $property->title])
      @include('shared.input', ['class'=>'col-md-3','name'=>'surface','type'=>'number','value'=> $property->surface])
      @include('shared.input', ['class'=>'col-md-3','label'=>'Prix','name'=>'price','value'=> $property->price])
      @include('shared.input', ['type'=>'textarea', 'name'=>'description', 'value'=>$property->description])
      @include('shared.input', ['class'=>'col-md-3','label'=>'Pièces','name'=>'rooms','type'=>'number','value'=> $property->rooms])
      @include('shared.input', ['class'=>'col-md-3','label'=>'Chambre','name'=>'bedrooms','type'=>'number','value'=> $property->bedrooms])
      @include('shared.input', ['class'=>'col-md-3','label'=>'Etage','name'=>'floor','type'=>'number','value'=> $property->floor])
      @include('shared.input', ['class'=>'col-md-6','label'=>'Adresse','name'=>'address','value'=> $property->address])
      @include('shared.input', ['class'=>'col-md-3','label'=>'Ville','name'=>'city','value'=> $property->city])
      @include('shared.input', ['class'=>'col-md-3','label'=>'Code postal','name'=>'postal_code','value'=> $property->postal_code])
      @include('shared.checkbox', ['class'=>'m-3','name'=>'sold', 'label'=> 'Vendu', 'value' => $property->sold])
      
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