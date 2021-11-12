<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_s', function (Blueprint $table) {
            $table->id();

            $table->string('pc');
            $table->foreign('pc')
                ->references('pc')
                ->on('projects')
                ->onUpdate('cascade')
                ->onDelete('cascade');


            $table->unsignedSmallInteger('en')->nullable(false);
            $table->unsignedInteger('sen')->nullable(false);
            $table->date('dt')->nullable(false);
            $table->enum('ft', ['SS1', 'SS2', 'SS3',])->nullable(false);

            $table->unsignedInteger('ssen')->nullable(true);
            /*This must be unique in e_d_s table, so far it is not
             *
             * $table->foreign('ssen')
                ->references('sen')
                ->on('e_d_s')
                ->onUpdate('cascade')
                ->onDelete('cascade');
             */

            $table->unsignedInteger('sfr')->nullable(true);
            $table->foreign('sfr')
                ->references('fr')
                ->on('e_d_s')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedInteger('fr')->unique()->nullable(false);
            $table->unsignedTinyInteger('tx')->nullable(true);
            $table->unsignedTinyInteger('sas')->nullable(false);
            $table->unsignedTinyInteger('me')->nullable(false);
            $table->unsignedInteger('n')->nullable(false);
            $table->enum('bf', array('01', '02'))->nullable(false);
            $table->unsignedInteger('slc')->nullable(false);
            $table->enum('st', array(1,2,3) )->nullable(false);
            $table->unsignedTinyInteger('si')->nullable(true);
            $table->unsignedTinyInteger('sc')->nullable(true);
            $table->longText('notes')->nullable(true);
            $table->unsignedTinyInteger('sid')->nullable(true);
            $table->unsignedTinyInteger('ni')->nullable(true);
            $table->unsignedTinyInteger('nb')->nullable(true);
            $table->unsignedTinyInteger('sid=01')->nullable(true);
            $table->unsignedTinyInteger('sid=02')->nullable(true);
            $table->unsignedTinyInteger('sid=03')->nullable(true);
            $table->unsignedTinyInteger('sid=04')->nullable(true);
            $table->unsignedTinyInteger('sid=05')->nullable(true);
            $table->unsignedTinyInteger('sid=06')->nullable(true);
            $table->unsignedTinyInteger('sid=07')->nullable(true);
            $table->unsignedTinyInteger('nd')->nullable(true);
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
        Schema::dropIfExists('s_s');
    }
}

