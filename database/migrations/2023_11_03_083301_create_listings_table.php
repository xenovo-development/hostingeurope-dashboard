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
            $table->integer('fs_integration_type')->nullable();
            $table->string('currency')->nullable();
            $table->bigInteger('channel_listing_id')->nullable();
            $table->integer('room_type')->nullable();
            $table->integer('listing_type')->nullable();
            $table->integer('property_type_id')->nullable();
            $table->string('property_type')->nullable();
            $table->string('instant_booking')->nullable();
            $table->string('name')->nullable();
            $table->string('nickname')->nullable();
            $table->integer('security_deposit')->nullable();
            $table->float('cleaning_fee')->nullable();
            $table->float('pets_fee')->nullable();
            $table->integer('extra_person')->nullable();
            $table->integer('guest_included')->nullable();
            $table->float('default_daily_price')->nullable();
            $table->float('weekend_price')->nullable();
            $table->integer('weekly_price_factor')->nullable();
            $table->integer('monthly_price_factor')->nullable();
            $table->integer('min_nights')->nullable();
            $table->integer('max_nights')->nullable();
            $table->time('checkin_start')->nullable();
            $table->time('checkin_end')->nullable();
            $table->time('checkout')->nullable();
            $table->integer('cancel_policy')->nullable();
            $table->integer('max_notice_days')->nullable();
            $table->integer('min_notice_hours')->nullable();
            $table->string('thumbnail_file')->nullable();
            $table->boolean('is_listed')->nullable();
            $table->string('country')->nullable();
            $table->string('country_code')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->integer('zipcode')->nullable();
            $table->string('street')->nullable();
            $table->string('neighbourhood')->nullable();
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();
            $table->integer('timezone_offset')->nullable();
            $table->string('timezone')->nullable();
            $table->float('price_markup')->nullable();
            $table->integer('master_calendar')->nullable();
            $table->integer('person_capacity')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->integer('bathroom_shared')->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('beds')->nullable();
            $table->integer('area')->nullable();
            $table->string('symbol')->nullable();
            $table->string('unicode')->nullable();
            $table->string('position')->nullable();
            $table->string('before')->nullable();
            $table->integer('service_pms')->nullable();
            $table->string('integration_nickname')->nullable();
            $table->string('integration_name')->nullable();
            $table->string('integration_photo')->nullable();
            $table->float('price')->nullable();
            $table->float('price_monthly')->nullable();
            $table->float('cleaning_percent')->nullable();
            $table->float('cuts_percent')->nullable();
            $table->json('tags')->nullable();
            $table->json('custom_fields')->nullable();
            $table->json('users')->nullable();
            $table->integer('integration_id')->nullable();

            $table->foreignId('user_id')->default(1)->constrained()->onDelete('cascade');
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
