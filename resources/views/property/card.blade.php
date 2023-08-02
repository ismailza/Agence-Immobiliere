<div class="card">
  @php
    $pic = $property->pictures()->first();
  @endphp
  <img src="{{ $pic ? $pic->pictureUrl() : asset('storage/images/default.png') }}" class="card-img-top" alt="{{ $property->title }} image">
  <div class="card-body">
    <h5 class="card-title">
      <a href="{{ route('property.show', ['slug'=> $property->getSlug(), 'property'=> $property->id]) }}">{{ $property->title }}</a>
    </h5>
    <p class="card-text">
      {{ $property->surface }} m² - {{ $property->city }} ({{ $property->postal_code }})
    </p>
    <div class="text-primary fw-bold">{{ number_format(num: $property->price, decimals: 2, thousands_separator: ' ') }} DH</div>
  </div>
</div>