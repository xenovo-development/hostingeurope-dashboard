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
            $table->float('extras_price_ex')->nullable();
            $table->float('extras_price_inc')->nullable();
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
            $table->string('confirmation_code')->nullable();
            $table->integer('nights')->nullable();
            $table->date('checkIn')->nullable();
            $table->date('checkOut')->nullable();
            $table->integer('guests')->nullable();
            $table->integer('adults')->nullable();
            $table->integer('children')->nullable();
            $table->integer('infants')->nullable();
            $table->integer('pets')->nullable();
            $table->date('confirmed_at')->nullable();
            $table->integer('advance_days')->nullable();
            $table->integer('cancel_policy')->nullable();
            $table->time('planned_arrival')->nullable();
            $table->time('planned_departure')->nullable();
            $table->integer('beds_to_be_prepared')->nullable();
            $table->text('notes')->nullable();
            $table->text('extra_info')->nullable();
            $table->string('cancel_penalty',1000)->nullable();
            $table->text('cleaning_notes')->nullable();
            $table->text('guest_details')->nullable();
            $table->text('price_details')->nullable();
            $table->text('addons_details')->nullable();
            $table->float('addons_price')->nullable();
            $table->string('added_by')->nullable();
            $table->dateTime('cancelled_at')->nullable();
            $table->float('payout_price')->nullable();
            $table->integer('payout_by_channel')->nullable();
            $table->float('city_tax')->nullable();
            $table->string('channel_reservation_id')->nullable();
            $table->string('listing_nickname')->nullable();
            $table->unsignedBigInteger('channel_listing_id')->nullable();
            $table->unsignedBigInteger('listing_channel_id')->nullable();
            $table->string('guest_name')->nullable();
            $table->string('guest_email')->nullable();
            $table->string('guest_phone')->nullable();
            $table->string('guest_photo')->nullable();
            $table->string('guest_location')->nullable();
            $table->string('guest_languages')->nullable();
            $table->integer('integration_id')->nullable();
            $table->string('integration_name')->nullable();
            $table->string('integration_nickname')->nullable();
            $table->integer('integration_type')->nullable();
            $table->json('tags')->nullable();
            $table->dateTime('checked_in_mark')->nullable();
            $table->dateTime('checked_out_mark')->nullable();
            $table->integer('hostify_id')->nullable();
            $table->string('paid_part')->nullable();
            $table->float('paid_sum')->nullable();
            $table->boolean('is_manual')->nullable();
            $table->integer('message_id')->nullable();
            $table->integer('guest_id')->nullable();
            $table->integer('parent_listing_id')->nullable();
            $table->string('listing_title')->nullable();
            $table->string('listing_photo')->nullable();
            $table->string('integration_photo')->nullable();
            $table->json('custom_fields')->nullable();
            $table->float('vat_amount')->nullable();

            $table->foreignId('listing_id')->constrained()->onDelete('cascade');
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
