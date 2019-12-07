<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuppetClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('puppet_classes', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->string('description')->nullable();
        $table->timestamps();
      });

      // Insert classes
      DB::table('puppet_classes')->insert(
        array(
          'id' => 1,
          'name' => 'puppet::agent',
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
      Schema::dropIfExists('puppet_classes');
    }
}
