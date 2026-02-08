<x-layout>
    <form action="/wishlists/{{ $wishlist->id}}" method="POST">
    @csrf
    @method('PATCH')
    <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
      <legend class="fieldset-legend">Edit wishlist</legend>
      <a href="/wishlists">Back</a>
      <div class="join">
        <input type="text" name="name" value="{{ $wishlist->name }}" class="input join-item" placeholder="Wishlist name" required />
        <button class="btn join-item">Save</button>
      </div>
    </fieldset>
  </form>
</x-layout>