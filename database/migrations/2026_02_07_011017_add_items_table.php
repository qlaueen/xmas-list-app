<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // items
    // - id INT PRIMARY KEY
    // - wishlist_id INT (FK -> wishlists.id)
    // - name STRING
    // - price FLOAT
    // - link STRING
    // - image STRING
    // - description STRING
    // - is_claimed BOOLEAN DEFAULT FALSE
    // - claimed_by INT (FK -> users.id, NULL if not claimed) 
    // - claimed_at TIMESTAMP
    // - is_purchased BOOLEAN DEFAULT FALSE
    // - purchased_by INT (FK -> users.id, NULL if not purchased)
    // - purchased_at TIMESTAMP
    // - created_at TIMESTAMP
    // - updated_at TIMESTAMP

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wishlist_id')->constrained('wishlists')->onDelete('cascade');
            $table->string('name');
            $table->decimal('price', 10, 2)->nullable();
            $table->string('link')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_claimed')->default(false)->index();
            $table->foreignId('claimed_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('claimed_at')->nullable();
            $table->boolean('is_purchased')->default(false)->index();
            $table->foreignId('purchased_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('purchased_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
