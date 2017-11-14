<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZaposlenisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zaposlenis', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('firma_id')->unsigned(); // ranije firmaID
            $table->foreign('firma_id')->references('id')->on('firmas')->onDelete('cascade');

            // obrisati 'interniID' => array('integer', 0)

            $table->integer('tip_zaposlenja')->unsigned(); // ranije tipZaposlenja
            $table->string('ime');
            $table->string('prezime');
            $table->string('adresa');
            $table->string('mesto');
            $table->string('telefon');
            $table->string('status'); // default 'Aktivan'

            $table->decimal('koeficijent', 8, 2);
            $table->string('donet_minuli_rad'); // format '0-0-0', ranije donetMinuliRad
            $table->string('datum_zaposlenja'); // format '0000-00-00', ranije datumZaposlenja
            $table->string('jmbg');
            $table->string('datum_rodjenja'); // format '0000-00-00', ranije datumRodjenja
            $table->string('pol'); // 'm' ili 'f', default 'm'
            $table->integer('strucna_sprema_id'); // ranije strucnaSpremaID
            $table->integer('opstina_id'); // opstinaID
            $table->integer('banka_id'); // ranije bankaID
            $table->string('ziroracun');  // ranije racun
            $table->string('radno_mesto'); // ranije radnoMesto
            $table->string('opis');
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
        Schema::dropIfExists('zaposlenis');
    }
}
