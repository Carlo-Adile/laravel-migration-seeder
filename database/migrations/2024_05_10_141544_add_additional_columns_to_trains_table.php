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
        Schema::table('trains', function (Blueprint $table) {
            $table->integer('remaining_tickets')->nullable();
            $table->decimal('ticket_price', 4, 2)->nullable();
            $table->boolean('has_stopover')->nullable();
            $table->boolean('has_disabilities_support')->nullable();
            $table->text('details')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trains', function (Blueprint $table) {
            $table->dropColumn('remaining_tickets');
            $table->dropColumn('ticket_price');
            $table->dropColumn('has_stopover');
            $table->dropColumn('has_disabilities_support');
            $table->dropColumn('details');
        });
    }
};
