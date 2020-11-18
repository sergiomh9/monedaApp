<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonedasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moneda', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre', 45);
            $table->string('simbolo', 6);
            $table->string('pais', 45);
            $table->decimal('valor', 8, 2);
            $table->date('fecha')->nullable();
            $table->unique(['nombre','pais']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moneda');
    }
}
