<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid');
            $table->string('name');
            $table->string('sector');
            $table->string('sub_sector')->nullable();
            $table->string('description')->nullable();
            $table->string('type')->default('Desktop');
            $table->string('manufacturer')->nullable();
            $table->string('model')->nullable();
            $table->string('processor')->nullable();
            $table->string('memory')->nullable();
            $table->string('storage')->nullable();
            $table->string('os')->nullable();
            $table->string('ipv4');
            $table->string('mac')->nullable();
            $table->string('domain_primary_user')->nullable();
            $table->timestamp('acquisition_date')->nullable();
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
        Schema::dropIfExists('devices');
    }
}
