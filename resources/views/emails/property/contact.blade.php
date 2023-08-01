<x-mail::message>
# Nouvelle demande de contact

Une demande de contact a été fait pour le bien <a href="{{ route('property.show', ['slug'=> $property->getSlug(), 'property'=> $property->id]) }}" target="_blank">{{ $property->name }}</a>.
- Prénom : {{ $data['firstname'] }}
- Nom : {{ $data['lastname'] }}
- Télephone : {{ $data['phone'] }}
- Email : {{ $data['email'] }}

** Message :** <br> 
{{ $data['message'] }}


{{ config('app.name') }}
</x-mail::message>
