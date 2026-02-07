<x-layout>
  <form action="/wishlists" method="POST">
    @csrf
    <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
      <legend class="fieldset-legend">Create a new wishlist</legend>
      <div class="join">
        <input type="text" name="wishlist" class="input join-item" placeholder="Wishlist name" />
        <button class="btn join-item">Create</button>
      </div>
    </fieldset>
  </form>
</x-layout>