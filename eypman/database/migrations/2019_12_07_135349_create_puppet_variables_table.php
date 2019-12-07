<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuppetVariablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('puppet_variables', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('name');
        $table->string('description')->nullable();
        $table->string('default_value')->nullable();
        $table->timestamps();
        $table->integer('puppet_class_id')->references('id')->on('puppet_classes')->nullable();
        $table->integer('puppet_define_id')->references('id')->on('puppet_defines')->nullable();
      });

      //puppet::agent
      DB::table('puppet_variables')->insert(
        array(
          'name' => 'puppetmaster',
          'puppet_class_id' => 1,
        )
      );
      DB::table('puppet_variables')->insert(
        array(
          'name' => 'puppetmasterport',
          'puppet_class_id' => 1,
        )
      );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puppet_variables');
    }
}
