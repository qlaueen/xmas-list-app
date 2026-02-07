<x-layout>
  @if ($wishlists->count())
    <div class="card card-border bg-base-100 w-96">
      <h2>Your wishlists</h2>
      @foreach($wishlists as $wishlist)
        <div class="card-body">
          <h2 class="card-title">{{ $wishlist->name }}</h2>
          <div class="card-actions justify-end">
            <a href="/wishlists/{{ $wishlist->id }}" class="btn btn-primary">View</a>
            <a href="/wishlists/{{ $wishlist->id }}/edit" class="btn btn-primary">Edit name</a>
          </div>
        </div>
      @endforeach
    </div>
  @else 
    <p>You don't have any wishlists. <a href="wishlists/create">Create one here!</a></p>
  @endif
</x-layout>