<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAkunTableAddKolomNeh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('akun', function (Blueprint $table) {
            $table->string('email')->nullable()->after('username');
            $table->unsignedInteger('umur')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('akun', function (Blueprint $table) {
            $table->dropColumn(['email', 'umur']);
        });
    }
}
