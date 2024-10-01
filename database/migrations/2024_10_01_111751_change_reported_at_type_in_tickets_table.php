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
    Schema::table('tickets', function (Blueprint $table) {
        $table->timestamp('reported_at')->change(); // Change type to timestamp
    });
}

public function down()
{
    Schema::table('tickets', function (Blueprint $table) {
        // If you want to revert, you can specify the old type, like string or datetime
        $table->dateTime('reported_at')->change(); // Change back to original type
    });
}

};
