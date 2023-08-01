@extends('layout.admin')

@section('title', $option->exists ? 'Editer l\'option' : 'Ajouter une option')

@section('content')
    <h4>@yield('title')</h4>

    <form class="row" action="{{ route($option->exists ? 'admin.option.update' : 'admin.option.store', $option) }}" method="post" enctype="multipart/form-data">
      @method($option->exists ? 'put' : 'post')
      @csrf
      
      <x-input class="col-md-12" label="Nom" name="name" :value="$option->name" />
      
      <div class="d-flex justify-content-center">
        @if (request()->route()->getName() === 'admin.option.edit')
          <button type="submit" class="btn btn-warning m-2">Modifier</button>
          <a href="{{ route('admin.option.index') }}" class="btn btn-secondary m-2">Annuler</a>
        @else
          <button type="submit" class="btn btn-primary m-2">Enregistrer</button>
          <button type="reset" class="btn btn-secondary m-2">Annuler</button>
        @endif
      </div>
    </form>

@endsection