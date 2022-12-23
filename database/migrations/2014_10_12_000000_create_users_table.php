<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('department_id')->unsigned();            
            $table->integer('role_id')->unsigned();
            $table->string('username');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone', 12)->unique();
            $table->string('password');
            $table->date('birthday');
            $table->string('sex', 1);
            $table->string('graduation', 4);
            $table->text('address');
            $table->string('img')->default('/image/default.png');
            $table->text('skill');
            $table->integer('height')->unsigned();
            $table->integer('weight')->unsigned();            
            $table->text('location');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'role_id' => 1,
            'username' => 'admin',
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'phone' => '0812345678910',
            'password' => bcrypt('admin'),
            'birthday' => '2022-12-12',
            'sex' => 'L'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
