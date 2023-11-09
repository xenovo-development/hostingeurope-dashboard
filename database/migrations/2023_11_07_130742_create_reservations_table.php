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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('currency')->nullable();
            $table->float('price_per_night')->nullable();
            $table->float('base_price')->nullable();
            $table->float('security_price')->nullable();
            $table->float('extras_price')->nullable();
            $table->float('cancellation_fee')->nullable();
            $table->float('tax_amount')->nullable();
            $table->float('collected_tax')->nullable();
            $table->float('host_collected_tax')->nullable();
            $table->float('cleaning_fee')->nullable();
            $table->float('channel_commission')->nullable();
            $table->float('service_charge')->nullable();
            $table->float('subtotal')->nullable();
            $table->float('revenue')->nullable();
            $table->float('transaction_fee')->nullable();
            $table->float('sum_refunds')->nullable();
            $table->float('owner_revenue')->nullable();
            $table->float('net_revenue')->nullable();
            $table->string('source')->nullable();
            $table->string('status')->nullable();
            $table->integer('nights')->nullable();
            $table->date('checkIn')->nullable();
            $table->date('checkOut')->nullable();
            $table->integer('guests')->nullable();
            $table->integer('adults')->nullable();
            $table->integer('infants')->nullable();
            $table->integer('pets')->nullable();
            $table->date('confirmed_at')->nullable();
            $table->integer('advance_days')->nullable();
            $table->time('planned_arrival')->nullable();
            $table->time('planned_departure')->nullable();
            $table->text('notes')->nullable();
            $table->text('extra_info')->nullable();
            $table->text('cleaning_notes')->nullable();
            $table->float('payout_price')->nullable();
            $table->float('city_tax')->nullable();
            $table->string('listing_nickname')->nullable();
            $table->string('guest_name')->nullable();
            $table->string('guest_email')->nullable();
            $table->integer('integration_id')->nullable();
            $table->string('integration_name')->nullable();
            $table->integer('paid_sum')->nullable();
            $table->boolean('is_manual')->nullable();
            $table->string('listing_title')->nullable();
            $table->string('listing_photo')->nullable();

            $table->integer('listing_id')->constrained('listings','listing_id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
