<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Owner;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('city');
            $table->integer('age');
            $table->timestamps();
        });

        Schema::table('books', function (Blueprint $table) {
            $table->foreignIdFor(Owner::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owners');

        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('owner_id');
        });
    }
};
