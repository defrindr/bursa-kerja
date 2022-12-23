<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndustryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('industry', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone', 12)->unique();
            $table->text('address');
            $table->string('website')->unique();
            $table->boolean('email_published');
            $table->boolean('phone_published');
            $table->timestamps();
        });

        // dummy of 10k data
        for ($i = 0; $i < 100; $i++) {
            DB::table('industry')->insert([
                'name' => str_random(10),
                'email' => str_random(10) . '@gmail.com',
                'phone' => '081' . rand(100000000, 999999999),
                'address' => str_random(100),
                'website' => str_random(10) . '@email.com',
                'email_published' => rand(0, 1),
                'phone_published' => rand(0, 1),
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
        Schema::drop('industry');
    }
}
