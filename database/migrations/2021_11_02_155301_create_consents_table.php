<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consents', function (Blueprint $table) {
            $table->id();
            $table->string('pc');
            $table->foreign('pc')->references('pc')->on('projects')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedSmallInteger('en')->nullable(false);
            $table->unsignedInteger('sen')->nullable(false);

            $table->unsignedInteger('si')->nullable(true);
            $table->string('irb')->nullable(false);
            $table->unsignedInteger('fr')->unique()->nullable(false);
            $table->unsignedInteger('ict')->nullable(true);
            $table->date('dt')->nullable(false);
            $table->unsignedInteger('dsen')->nullable(false);
            $table->unsignedInteger('ea')->nullable(true);
            $table->unsignedInteger('cr')->nullable(true);
            $table->unsignedInteger('cp')->nullable(true);
            $table->unsignedSmallInteger('hh')->nullable(true);
            $table->unsignedInteger('stid')->nullable(true);
            $table->unsignedTinyInteger('shh')->nullable(true);
            $table->unsignedTinyInteger('st')->nullable(true);
            $table->tinyText('vi')->nullable(true);
            $table->tinyText('vn')->nullable(true);
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
        Schema::dropIfExists('consents');
    }
}
