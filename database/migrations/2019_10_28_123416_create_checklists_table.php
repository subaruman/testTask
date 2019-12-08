<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklists', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->string('name');
            $table->bigInteger('user_id')->unsigned();
            $table->boolean('completed');
            $table->timestamps();
        });

     /*   Schema::table('checklists', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreign('id')
                ->references('checklist_id')
                ->on('items_checklist')
                ->onDelete('cascade');

        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checklists');
    }
}
