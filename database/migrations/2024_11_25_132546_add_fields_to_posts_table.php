<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('post_title');
            $table->text('description');
            $table->unsignedBigInteger('category_id');
            $table->string('image')->nullable(); // For storing the image
        });
    }
    
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('post_title', 'description', 'category_id', 'image');
        });
    }
    
};
