<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_d_s', function (Blueprint $table) {
            $table->id();
            $table->string('pc');
            $table->foreign('pc')->references('pc')->on('projects')
                ->onDelete('cascade')
                ->onUpdate('cascade');


            $table->unsignedSmallInteger('en')->nullable(false);
            $table->unsignedInteger('sen')->nullable(false);

            /*----------------------------------------------------------|
            | Form Type (FT) code conflicts with Finish Time (FT) code, |
            | I decided to discard it until we discard with the team    |
            |-----------------------------------------------------------|*/

            // $table->tinyText('ft')->nullable(false);

            $table->unsignedInteger('si')->nullable(true);
            $table->unsignedInteger('fr')->unique()->nullable(false);
            $table->date('dt')->nullable(false);
            $table->unsignedInteger('ea')->nullable(true);
            $table->unsignedInteger('cr')->nullable(true);
            $table->unsignedInteger('cp')->nullable(true);
            $table->unsignedSmallInteger('hh')->nullable(true);
            $table->unsignedInteger('sid')->nullable(true);
            $table->unsignedTinyInteger('me')->nullable(false);
            $table->enum('in', [1, 2])->nullable(false);
            $table->unsignedTinyInteger('ht')->nullable(true);
            $table->time('st')->nullable(false);
            $table->time('ft')->nullable(false);
            $table->time('hp')->nullable(true);
            $table->unsignedTinyInteger('rnd')->nullable(true);
            $table->unsignedTinyInteger('blk')->nullable(true);
            $table->unsignedTinyInteger('shh')->nullable(true);
            $table->unsignedTinyInteger('stn')->nullable(true);
            $table->tinyText('vn')->nullable(true);
            $table->tinyText('vi')->nullable(true);
            $table->unsignedSmallInteger('tr')->nullable(true);
            $table->unsignedSmallInteger('dy')->nullable(true);
            $table->unsignedSmallInteger('hs')->nullable(true);
            $table->enum('vc', array(1, 2))->nullable(false);
            $table->unsignedInteger('dsen')->nullable(false);
            $table->longText('notes')->nullable(true);
            $table->tinyText('esi')->nullable(true);
            $table->tinyText('rsi')->nullable(true);
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
        Schema::dropIfExists('e_d_s');
    }
}
