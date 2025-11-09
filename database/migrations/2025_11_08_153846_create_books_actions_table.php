<?php

use App\Models\Book;
use App\Models\Reader;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books_actions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Book::class);
            $table->foreignIdFor(Reader::class);
            $table->date('get_date');
            $table->date('return_date')->nullable();
            $table->unsignedInteger('count')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books_actions');
    }
};
