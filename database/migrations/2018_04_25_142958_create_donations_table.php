<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('rg')->nullable();
            $table->string('email', 100)->unique();
            $table->string('fone', 10)->nullable();
            $table->string('cell_phone', 11)->nullable();
            $table->string('address', 100);
            $table->string('zip_code', 11)->unique();
            $table->string('state', 100);
            $table->string('city', 100);
            $table->string('type', 100);
            $table->integer('qty');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donations');
    }
}
