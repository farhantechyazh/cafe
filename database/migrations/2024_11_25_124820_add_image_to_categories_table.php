<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::table('categories', function (Blueprint $table) {
        $table->string('image')->nullable();  // Add the image column
    });
}

public function down()
{
    Schema::table('categories', function (Blueprint $table) {
        $table->dropColumn('image');  // Drop the image column if rollback is needed
    });
}

};
