<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFirmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firmas', function (Blueprint $table) {
          $table->increments('id');
          $table->string('naziv');
          $table->string('adresa');
          $table->string('mesto');
          $table->string('telefon');
          $table->integer('tip')->unsigned(); // default 1
          $table->string('status'); // default 'Aktivan'
          $table->string('matbr');
          $table->string('pib');
          $table->string('sifdel');
          $table->string('ziro_racun');
          $table->string('naziv_banke');
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
        Schema::dropIfExists('firmas');
    }
}
