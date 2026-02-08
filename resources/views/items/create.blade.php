<x-layout>
  <form action="/wishlists/{{ $wishlist->id }}/items" method="POST" enctype="multipart/form-data">
    @csrf
    
    <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
      <legend class="fieldset-legend">Add an item to your wishlist</legend>
      
      <label class="label" for="name">Name</label>
      <input type="text" name="name" class="input" placeholder="Name" required/>
      
      <label class="label" for="price">Price</label>
      <input type="number" step="0.01" name="price" class="input" placeholder="Price" />
      
      <label class="label" for="image">Image</label>
      <input type="file" name="image" accept="image/*" class="file-input" />
      
      <label class="label" for="description">Description</label>
      <textarea name="description" class="textarea" placeholder="Description"></textarea>
      
      <button class="btn btn-neutral mt-4">Add item</button>
    </fieldset>
  </form>
</x-layout>