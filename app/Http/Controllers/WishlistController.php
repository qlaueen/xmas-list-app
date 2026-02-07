<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wishlists = Wishlist::all();

        return view('wishlists.index', [
            'wishlists' => $wishlists,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wishlists.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        Wishlist::create([
            'name' => request('name'),
        ]);

        return redirect('/wishlists');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wishlist $wishlist)
    {
        return view('wishlists.show', [
            'wishlist' => $wishlist,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wishlist $wishlist)
    {
        return view('wishlists.edit', [
            'wishlist' => $wishlist,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Wishlist $wishlist)
    {
        $wishlist->update([
            'name' => request('name'),
        ]);

        return redirect('/wishlists/{$wishlist->id}');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();

        return redirect('/wishlists');
    }
}
