<?php

use App\Models\User;
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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role')->default(User::MEMBER);
            $table->rememberToken();
            $table->timestamps();
        });

        factory(User::class)->create([
            'name' => 'admin',
            'email' => 'admin@hamelius.ru',
            'role' => User::ADMIN,
        ]);

        factory(User::class)->create([
            'name' => 'user',
            'email' => 'user@hamelius.ru',
        ]);
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
