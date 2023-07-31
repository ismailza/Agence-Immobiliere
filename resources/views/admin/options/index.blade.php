@extends('layout.admin')

@section('title', 'Liste des options')

@section('content')

    <div class="d-sm-flex justify-content-between align-items-start">
      <div>
        <h4 class="card-title card-title-dash title">@yield('title')</h4>
      </div>
      <div>
        <a href="{{ route('admin.option.create') }}" class="btn btn-primary btn-sm text-white mb-0 me-0" type="button" >+ Ajouter une option</a>
      </div>
    </div>
    <table class="table table-stripped">
      <thead>
        <tr>
          <th>Nom</th>
          <th class="text-end">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($options as $option)
        <tr>
          <td>{{ $option->name }}</td>
          <td>
            <div class="d-flex gap-2 w-100 justify-content-end">
              <a href="{{ route('admin.option.edit', $option) }}" class="btn btn-warning btn-sm">Editer</a>
              <form action="{{ route('admin.option.destroy', $option) }}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-danger btn-sm">Supprimer</button>
              </form>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" class="text-secondary text-center">Aucune option disponible</td>
        </tr>
        @endforelse
      </tbody>
    </table>
    {{ $options->links() }}

@endsection