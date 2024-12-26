<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    
    // public $timestamps = false;
    public function up()
    {
        Schema::create('api_logs', function (Blueprint $table) {
            $table->id();
            // $table->timestamp('timestamp');
            $table->string('method');
            $table->string('url');
            $table->integer('status_code');
            $table->timestamps();
        });
          
    }

    public function down()
    {
        Schema::dropIfExists('api_logs');
    }
};
