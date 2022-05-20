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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('namme');
            $table->string('slug');
            $table->string('description');
            $table->string('image');
            $table->string('status')->default(0);
            $table->string('population')->default(0);
            $table->string('meta_title');
            $table->string('meta_descrip');
            $table->string('meta_keywords');
            
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
        Schema::dropIfExists('categories');
    }
};
