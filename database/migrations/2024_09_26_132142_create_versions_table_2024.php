<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('versions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('versionable_id');
            $table->string('versionable_type');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('model_data');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('versions');
    }
};
