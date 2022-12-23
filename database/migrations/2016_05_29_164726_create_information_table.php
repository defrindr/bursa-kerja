<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('industry_id');
            $table->string('title');
            $table->text('definition');
            $table->date('deadline');
            $table->text('requirement');
            $table->text('other');
            $table->string('img');
            $table->boolean('hidden');
            $table->integer('read')->unsigned();
            $table->timestamps();
        });

        // 10k dummy data
        for ($i = 0; $i < 10000; $i++) {
            DB::table('information')->insert([
                'user_id' => 1,
                'industry_id' => rand(1, 10),
                'title' => str_random(10),
                'definition' => str_random(100),
                'deadline' => date('Y-m-d'),
                'requirement' => str_random(100),
                'other' => str_random(100),
                'img' => str_random(10),
                'hidden' => rand(0, 1),
                'read' => rand(0, 1000),
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
        Schema::drop('information');
    }
}
