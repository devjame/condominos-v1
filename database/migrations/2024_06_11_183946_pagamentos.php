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
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->float("valor");
            $table->dateTime("data")->nullable();;
            $table->string("metodo")->nullable();
            $table->foreignId('proprietario_id')->constrained()->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pagamentos', function (Blueprint $table) {        
            $table->dropForeign(['proprietario_id']);
        });
        
        Schema::dropIfExists('pagamentos');
    }
};
