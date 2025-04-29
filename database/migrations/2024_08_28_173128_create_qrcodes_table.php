<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQrcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qrcodes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('standards_id')->unsigned()->index();
            $table->unsignedBigInteger('subjects_id')->unsigned()->index();
            $table->string('chapter')->nullable();
            $table->string('slug')->nullable();
            $table->string('link')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();

            $table->foreign('standards_id')->references('id')->on('standards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qrcodes');
    }
}
