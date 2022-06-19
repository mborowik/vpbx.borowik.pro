<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sips', function (Blueprint $table) {
            $table->id();
            $table->string('uniqid');
            $table->foreign('uniqid')->references('uniqid')->on('providers');
            $table->string('disabled')->default(0);
            $table->string('extension')->nullable();
            $table->string('type')->nullable();
            $table->string('host')->nullable();
            $table->string('port')->nullable();
            $table->string('username')->nullable();
            $table->string('secret')->nullable();
            $table->string('defaultuser')->nullable();
            $table->string('fromuser')->nullable();
            $table->string('fromdomail')->nullable();
            $table->string('nat')->nullable();
            $table->string('dtmfmode')->nullable();
            $table->integer('qualifyfreq')->default(60);
            $table->string('qualify')->nullable();
            $table->string('busylevel')->nullable();
            $table->string('networkfilterid')->nullable();
            $table->string('manualattributes')->nullable();
            $table->string('disablefromuser')->default(0)->nullable();
            $table->string('noregister')->default(0)->nullable();
            $table->string('receive_calls_without_auth')->default(0)->nullable();
            $table->string('description')->nullable();
           
            
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
        Schema::dropIfExists('sips');
    }
}
