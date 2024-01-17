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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->date("date");
            $table->float("price");
            //traemos de la tabla trains el id para usarlo como clave foranea
            $table->unsignedBigInteger("train_id");
            $table->foreign("train_id")->references("id")->on("trains");
            //traemos de la tabla ticket_types el id del tipo de ticket sacado
            $table->unsignedBigInteger("ticket_type_id");
            $table->foreign("ticket_type_id")->references("id")->on("ticket_types");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
