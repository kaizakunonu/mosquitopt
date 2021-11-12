
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->string('pc')->unique(); // pc = project code
            $table->string('title');

            $table->foreignId('pi') // pi = project / principal investigator
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('pl') // pl = project leader/coordinator
            ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('pa') // pa = project administrator
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->longText('description');

            $table->foreignId('funder')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('department');
            $table->date('sd'); // start date
            $table->date('ed'); // end date

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
        Schema::dropIfExists('projects');
    }
}
