<x-layout>
  <form action="/wishlists/{{ $wishlist->id }}/items/{{ $item->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    
    <input type="text" name="name" value="{{ $item->name }}" required />
    <input type="number" step="0.01" name="price" value="{{ $item->price }}" />
    <input type="file" name="image" accept="image/*" />
    <textarea name="description">{{ $item->description }}</textarea>
    
    <button type="submit">Update Item</button>
  </form>
  <form action="/wishlists/{{ $wishlist->id }}/items/{{ $item->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-error">Delete Item</button>
  </form>
</x-layout>