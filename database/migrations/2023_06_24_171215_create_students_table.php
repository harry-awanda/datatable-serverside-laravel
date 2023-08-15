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
            $table->id();
            $table->string('nisn',50);
            $table->string('name',50);
            $table->enum('lp',['laki-laki', 'perempuan'])->default('laki-laki');
            $table->string('birthplace',40);
            $table->string('birthdate');
            $table->longText('address')->nullable();
            $table->string('religion');
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
