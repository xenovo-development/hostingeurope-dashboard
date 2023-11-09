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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('listing_id')->nullable();
            $table->string('property_type')->nullable();
            $table->string('name')->nullable();
            $table->string('nickname')->nullable();
            $table->integer('cleaning_fee')->nullable();
            $table->integer('extra_person')->nullable();
            $table->integer('guest_included')->nullable();
            $table->integer('default_daily_price')->nullable();
            $table->integer('weekend_price')->nullable();
            $table->integer('min_nights')->nullable();
            $table->integer('max_nights')->nullable();
            $table->time('checkin_start')->nullable();
            $table->time('checkin_end')->nullable();
            $table->time('checkout')->nullable();
            $table->string('thumbnail_file')->nullable();
            $table->boolean('is_listed')->nullable();
            $table->string('country')->nullable();
            $table->string('country_code')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->integer('zipcode')->nullable();
            $table->string('street')->nullable();
            $table->string('neighborhood')->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('beds')->nullable();
            $table->string('symbol')->nullable();
            $table->string('unicode')->nullable();
            $table->string('integration_photo')->nullable();
            $table->string('integration_name')->nullable();
            $table->integer('price')->nullable();
            $table->integer('price_monthly')->nullable();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
