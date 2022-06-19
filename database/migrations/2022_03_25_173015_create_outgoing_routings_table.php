<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutgoingRoutingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outgoing_routings', function (Blueprint $table) {
            $table->id();
            $table->string('rulename')->nullable();
            $table->unsignedBigInteger('provider_id_in');
            $table->unsignedBigInteger('provider_id_out');
            $table->string('priority')->nullable()->default('0');
            $table->string('numberbeginswith')->nullable();
            $table->string('restnumbers')->nullable()->default('9');
            $table->string('trimfrombegin')->nullable()->default('0');
            $table->string('prepend')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('outgoing_routings');
    }
}
