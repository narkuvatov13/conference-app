<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->string('name');
            $table->text('user_img')->nullable();
            $table->string('dogum_tarih')->nullable();
            $table->string('unvan')->nullable();
            $table->string('fakulte')->nullable();
            $table->string('alani')->nullable();
            $table->string('universitesi')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->integer('silindiMi')->default(0)->nullable();
            $table->integer('atandiMi')->default(0)->nullable();
            //$table->foreignId('konferans_id')->constrained();

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
};
