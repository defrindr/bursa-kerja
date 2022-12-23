<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePosition extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('position', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('information_id')->unsigned();
            $table->integer('department_id')->unsigned();
            $table->string('name');
            $table->text('definition');
            $table->text('skill');
            $table->integer('height')->unsigned();
            $table->integer('weight')->unsigned();
            $table->double('score');
            $table->integer('total');
            $table->integer('min_age');
            $table->integer('max_age');
            $table->string('sex', 3);
            $table->text('requirement');
            $table->string('location');
            $table->timestamps();
        });

        for ($i = 0; $i < 10000; $i++) {
            DB::table('position')->insert([
                'information_id' => rand(1, 100),
                'department_id' => rand(1, 3),
                'name' => str_random(10),
                'definition' => str_random(100),
                'skill' => str_random(100),
                'height' => rand(100, 200),
                'weight' => rand(30, 100),
                'score' => rand(0, 100),
                'total' => rand(0, 100),
                'min_age' => rand(0, 100),
                'max_age' => rand(0, 100),
                'sex' => 'L',
                'requirement' => str_random(100),
                'location' => 'Ponorogo ' . rand(1, 10),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('position');
    }
}
