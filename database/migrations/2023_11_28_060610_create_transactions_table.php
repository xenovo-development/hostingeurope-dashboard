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
            $table->string('channel_transaction_id')->nullable();
            $table->string('currency')->nullable();
            $table->string('type')->nullable();
            $table->string('type_description')->nullable();
            $table->string('charge_type')->nullable();
            $table->string('charge_status')->nullable();
            $table->float('amount')->nullable();
            $table->date('arrival_date')->nullable();
            $table->date('charge_date')->nullable();
            $table->boolean('is_completed')->nullable();
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
