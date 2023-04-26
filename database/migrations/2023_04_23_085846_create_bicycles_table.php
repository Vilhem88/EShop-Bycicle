<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("bicycles", function (Blueprint $table) {
            $table->id();
            $table->string("image_path");
            $table->string("brand");
            $table->string("model");
            $table->string("frame_size");
            $table->bigInteger("gender_id")->unsigned();
            $table->bigInteger("type_id")->unsigned();
            $table->year("year");
            $table->integer("price");
            $table->timestamps();

            $table->foreign("gender_id")->references('id')->on('genders')->onDelete('cascade');
            $table->foreign("type_id")->references('id')->on('types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("bicycles");
    }
};
