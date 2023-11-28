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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('channel_transaction_id');
            $table->string('currency');
            $table->float('amount');
            $table->date('arrival_date');
            $table->date('charge_date');
            $table->boolean('is_completed');
            $table->string('code')->nullable();
            $table->string('details')->nullable();
            $table->string('notes')->nullable();
            $table->integer('payout_type')->nullable();
            $table->string('source')->nullable();

            $table->foreignId('reservation_id')->constrained()->onDelete('cascade');
            $table->foreignId('listing_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
