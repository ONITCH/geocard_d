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
        Schema::table('users', function (Blueprint $table) {
            $table->string('contact1')->nullable()->after('file_path');
            $table->string('contact1_type')->nullable()->after('contact1');
            $table->string('contact2')->nullable()->after('contact1_type');
            $table->string('contact2_type')->nullable()->after('contact2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('contact1');
            $table->dropColumn('contact1_type');
            $table->dropColumn('contact2');
            $table->dropColumn('contact2_type');
        });
    }
};
