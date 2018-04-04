<?php

use Illuminate\Support\Facades\Schema;
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
        Schema::create('users', function ( Blueprint $table ) {
            $table->increments('id');
            $table->string('name');
            $table->string('tagline')->nullable();
            $table->string('email');
            $table->string('password');
            $table->boolean('is_studio')->default(false);
            $table->string('avatar_path')->nullable();
            $table->text('description')->nullable();
            $table->float('rating')->nullable();
            $table->string('phoneNo');
            $table->boolean('premium')->default(false);            
            $table->rememberToken();
            $table->timestamps();

//            $table->unique('email', 'users_email_uniq');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
