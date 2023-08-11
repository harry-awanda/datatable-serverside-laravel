<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nisn',50);
            $table->string('name',50);
            $table->string('lp',2);
            $table->string('birthplace',40);
            $table->date('birtdate');
            $table->text('address',150)->nullable();
            $table->string('religion',15)->nullable();
            $table->string('contact',15)->nullable();
            $table->string('prev_sch',150)->nullable();
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('students');
    }
}
