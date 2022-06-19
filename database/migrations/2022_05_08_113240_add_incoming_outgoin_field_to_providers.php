<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIncomingOutgoinFieldToProviders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('providers', function (Blueprint $table) {
            $table->enum('incomingA', ['+cckna', 'cckna','kna']);
            $table->enum('incomingB', ['+cckna', 'cckna','kna']);
            $table->enum('outgoingA', ['+cckna', 'cckna','kna']);
            $table->enum('outgoingB', ['+cckna', 'cckna','kna']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('providers', function (Blueprint $table) {
            //
        });
    }
}
