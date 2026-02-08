<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Auth::user()->items;

        // show only the items for the wishlist that is being viewed
        return view('items.index', [
            'items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Wishlist $wishlist)
    {
        return view('items.create', ['wishlist' => $wishlist]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Wishlist $wishlist)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // 2MB max
            'description' => 'nullable|string',
        ]);
        
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('items', 'public');
        }
        
        $wishlist->items()->create([
            'name' => $validated['name'],
            'price' => $validated['price'] ?? null,
            'image' => $imagePath,  // Save the path, not the file
            'description' => $validated['description'] ?? null,
        ]);
        
        return redirect("/wishlists/{$wishlist->id}");
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('items.show', [
            'item' => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wishlist $wishlist, Item $item)
    {
        return view('items.edit', [
            'wishlist' => $wishlist,
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wishlist $wishlist, Item $item)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'description' => 'nullable|string',
        ]);
        
        if ($request->hasFile('image')) {
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }
            $validated['image'] = $request->file('image')->store('items', 'public');
        }
        
        $item->update($validated);
        
        return redirect("/wishlists/{$wishlist->id}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wishlist $wishlist, Item $item)
    {
        $item->delete();
    
        return redirect("/wishlists/{$wishlist->id}");
    }
}
