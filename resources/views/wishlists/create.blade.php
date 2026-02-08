<x-layout>
  <form action="/item" method="POST">
    @csrf
    <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
      <legend class="fieldset-legend">Add a new item</legend>
      <div class="join">
        <input type="text" name="name" class="input join-item" placeholder="Wishlist name" required />
        <button class="btn join-item">Create</button>
      </div>
    </fieldset>
  </form>
</x-layout>