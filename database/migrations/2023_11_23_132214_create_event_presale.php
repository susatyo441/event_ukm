<?php

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
        Schema::create('event_presale', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_price_id');
            $table->unsignedBigInteger('event_id');
            $table->string('variant');
            $table->float('discount');
            $table->dateTime('start_date');
            $table->dateTime('due_to');
            $table->integer('max_purchase')->nullable();
            $table->timestamps();

            $table->foreign('event_price_id')->references('id')->on('event_price')->onDelete('cascade');
            $table->foreign('event_id')->references('id')->on('event')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_presale');
    }
};
