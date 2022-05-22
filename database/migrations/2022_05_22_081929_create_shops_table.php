<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('name',50)->nullable();
            $table->string('address',255)->nullable();
            $table->string('postcode',10)->nullable();
            $table->string('contact_name',50)->nullable();
            $table->string('contact_number',50)->nullable();
            $table->string('contact_email',50)->nullable();
            $table->string('qrcode_out',255)->nullable();
            $table->string('qrcode_in',255)->nullable();
            $table->boolean('shop_only');
            $table->string('lat',20)->nullable();
            $table->string('long',20)->nullable();
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
        Schema::dropIfExists('shops');
    }
}
