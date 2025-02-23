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
        Schema::create('konferans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('konferans_baslik');
            $table->text('konferans_icerik');
            $table->string('konferans_adres');
            $table->string('konferans_kategori');
            $table->string('konferans_turu');
            $table->string('konferans_email');
            $table->string('konferans_tel');
            $table->date('konferans_date');
            $table->string('konferans_tarih');
            $table->string('konferans_zaman');
            $table->string('konferans_taglar');
            $table->text('konferans_img')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konferans');
    }
};
