<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiamondsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diamonds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parties_id')->unsigned()->index();
            $table->string('mobile')->nullable();
            $table->string('dimond_name')->nullable();
            $table->text('description')->nullable();
            $table->string('shape')->nullable();
            $table->string('weight')->nullable();
            $table->string('purity')->nullable();
            $table->string('color')->nullable();
            $table->string('amount')->nullable();
            $table->string('planes_id')->nullable();
            $table->string('due_date')->nullable();
            $table->string('status')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('remark')->nullable();
            $table->string('payment_date')->nullable();
            $table->timestamps();

            $table->foreign('parties_id')->references('id')->on('parties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diamonds');
    }
}
