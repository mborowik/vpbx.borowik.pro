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
            $table->string('username')->unique();
            $table->string('secret')->nullable();
            $table->integer('contacts')->default(1);
            $table->integer('call_group')->default(1);
            $table->integer('pickup_group')->default(1);
            $table->string('context')->default(1);
            $table->foreignId('user_id')->constrained();
            $table->foreignId('firm_id')->constrained();
            $table->string('callerid')->nullable();


            // $table->string('uniqid');
            // $table->foreign('uniqid')->references('uniqid')->on('providers');
            // $table->string('disabled')->default(0);
            // $table->string('extension')->nullable();
            // $table->string('type')->nullable();
            // $table->string('host')->nullable();
            // $table->string('port')->nullable();
            // $table->string('username')->nullable();
            // $table->string('secret')->nullable();
            // $table->string('defaultuser')->nullable();
            // $table->string('fromuser')->nullable();
            // $table->string('fromdomail')->nullable();
            // $table->string('nat')->nullable();
            // $table->string('dtmfmode')->nullable();
            // $table->integer('qualifyfreq')->default(60);
            // $table->string('qualify')->nullable();
            // $table->string('busylevel')->nullable();
            // $table->string('networkfilterid')->nullable();
            // $table->string('manualattributes')->nullable();
            // $table->string('disablefromuser')->default(0)->nullable();
            // $table->string('noregister')->default(0)->nullable();
            // $table->string('receive_calls_without_auth')->default(0)->nullable();
            // $table->string('description')->nullable();
           
            
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


// $conf = "[$request->description]"   . PHP_EOL."\t";
// $conf .= "type = auth"   . PHP_EOL."\t";
// $conf .= "username = $request->description"   . PHP_EOL."\t";
// $conf .= "password = $request->secret"   . " \n\n";



// $conf .= "max_contacts = 5"   . " \n\n";


// $conf .= "type = endpoint"   . PHP_EOL."\t";
// $conf .= "context = all_peers"   . PHP_EOL."\t";
// $conf .= "dtmf_mode = auto"   . PHP_EOL."\t";
// $conf .= "disallow = all"   . PHP_EOL."\t";
// $conf .= "allow = alaw"   . PHP_EOL."\t";
// $conf .= "allow = ulaw"   . PHP_EOL."\t";
// $conf .= "allow = ilbc"   . PHP_EOL."\t";
// $conf .= "allow = opus"   . PHP_EOL."\t";
// $conf .= "allow = h264"   . PHP_EOL."\t";
// $conf .= "rtp_symmetric = yes"   . PHP_EOL."\t";
// $conf .= "force_rport = yes"   . PHP_EOL."\t";
// $conf .= "rewrite_contact = yes"   . PHP_EOL."\t";
// $conf .= "ice_support = no"   . PHP_EOL."\t";
// $conf .= "direct_media = no"   . PHP_EOL."\t";
// $conf .= "callerid = Marcin <$request->description>"   . PHP_EOL."\t";
// $conf .= "send_pai = yes"   . PHP_EOL."\t";
// $conf .= "call_group = 1"   . PHP_EOL."\t";
// $conf .= "pickup_group = 1"   . PHP_EOL."\t";
// $conf .= "sdp_session = mikopbx"   . PHP_EOL."\t";
// $conf .= "language = pl-pl"   . PHP_EOL."\t";
// $conf .= "mailboxes = admin@voicemailcontext"   . PHP_EOL."\t";
// $conf .= "device_state_busy_at = 1"   . PHP_EOL."\t";
// $conf .= "aors = $request->description"   . PHP_EOL."\t";
// $conf .= "auth = $request->description"   . PHP_EOL."\t";
// $conf .= "outbound_auth = $request->description"   . PHP_EOL."\t";
// $conf .= "acl = acl_204"   . PHP_EOL."\t";
// $conf .= "timers = no"   . PHP_EOL."\t";
// $conf .= "message_context = messages"   . PHP_EOL."\t";
// $conf .= "inband_progress = yes"   . PHP_EOL."\t";
// $conf .= "tone_zone = pl"   . " \n\n";
