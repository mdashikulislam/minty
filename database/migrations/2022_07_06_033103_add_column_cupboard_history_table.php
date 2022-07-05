<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('cupboard_histories', function (Blueprint $table) {
            $table->integer('qnty')->default(0);
            $table->decimal('cost_each',10,2)->default(0);
            $table->decimal('cost_total',10,2)->default(0);
        });
    }

    public function down()
    {
        Schema::table('cupboard_histories', function (Blueprint $table) {

        });
    }
};
