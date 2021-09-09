<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomputersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komputers', function (Blueprint $table) {
            $table->integer('id');
            $table->string('user_id', 30)->index();
            $table->string('ip_komp', 30);
            $table->integer('host_name', 40);
            $table->string('mac_address',40);
            $table->string('os_version',50);
            $table->string('model_build',40);
            $table->string('processor_type',40);
            $table->string('dept_name',40);
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
        Schema::dropIfExists('komputers');
    }
}
