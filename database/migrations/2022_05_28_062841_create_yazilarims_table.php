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
        Schema::create('yazilarims', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('yazar_adSoyad');
            $table->text('yazar_img');
            $table->string('yazar_universiteSirket');
            $table->string('yazar_eposta');
            $table->string('yazar_telNo');
            $table->string('yazi_basligi');
            $table->text('yazi_img');
            $table->string('yazi_alani');
            $table->string('yazi_icerik');
            $table->text('yazi_dosya');
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
        Schema::dropIfExists('yazilarims');
    }
};
