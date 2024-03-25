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
        Schema::create('ritten', function (Blueprint $table) {
            $table->id();
            $table->string('naam_verzender');
            $table->string('adres_verzender');
            $table->string('postcode_verzender', 10);
            $table->string('plaats_verzender');
            $table->string('naam_ontvanger');
            $table->string('adres_ontvanger');
            $table->string('postcode_ontvanger', 10);
            $table->string('plaats_ontvanger');
            $table->float('kosten', 8, 2)->default(0); // Standaardwaarde 0 voor kosten
            $table->unsignedInteger('aantal_km');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
