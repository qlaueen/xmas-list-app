<x-layout>
  <h1>{{ $wishlist->name }}</h1>
  
  <form action="/wishlists/{{ $wishlist->id }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete this wishlist</button>
  </form>
  
  <a href="/wishlists">Back</a>
  <a href="/wishlists/{{ $wishlist->id }}/items/create">Add an item to your wishlist</a>
  
  @foreach($wishlist->items as $item)
    <x-item-card :item="$item" :wishlist="$wishlist" />
  @endforeach
</x-layout>