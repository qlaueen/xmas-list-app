<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //     groups_wishlists
    // - id INT PRIMARY KEY
    // - group_id INT (FK -> groups.id)
    // - wishlist_id INT (FK -> wishlists.id)
    // - created_at TIMESTAMP
    // - UNIQUE(group_id, wishlist_id)
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('groups_wishlists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')->constrained('groups')->onDelete('cascade');
            $table->foreignId('wishlist_id')->constrained('wishlists')->onDelete('cascade');
            $table->timestamps();
            
            // Prevent duplicate entries
            $table->unique(['group_id', 'wishlist_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups_wishlists');
    }
};
