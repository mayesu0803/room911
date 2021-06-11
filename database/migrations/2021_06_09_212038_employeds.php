<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Employeds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('employeds', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_employed')->unique();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->boolean('room_access')->default(false);
            $table->timestamp('date_deleted')->nullable();
            $table->bigInteger('id_department')->unsigned();
            $table->foreign('id_department')->references('id')->on('departments');
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
        Schema::dropIfExists('employeds');
        Schema::dropIfExists('departments');
    }
}