@props(['item', 'wishlist'])

<div class="card bg-base-100 w-96 shadow-sm">
  <figure class="px-10 pt-10">
    <img
      src="{{ asset('storage/' . $item->image) }}"
      alt="{{ $item->name }}"
      class="rounded-xl" />
  </figure>
  <div class="card-body items-center text-center">
    <h2 class="card-title">{{ $item->name }}</h2>
    <p>{{ $item->description ?? 'No description' }}</p>
    @if($item->price)
      <p class="font-bold">${{ number_format($item->price, 2) }}</p>
    @endif
    <div class="card-actions">
      <a href="/wishlists/{{ $wishlist->id }}/items/{{ $item->id }}/edit">Edit this item</a>
    </div>
  </div>
</div>