<?php

use App\Models\Author;
use App\Models\Publishing;
use App\Models\Type_of_book;
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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->foreignIdFor(Type_of_book::class);
            $table->foreignIdFor(Author::class);
            $table->foreignIdFor(Publishing::class);
            $table->year('year_of_publish');
            $table->unsignedInteger('count_of_sheets');
            $table->unsignedInteger('count_of_items');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
