<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPelangganIdToGeneralCleanings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('general_cleanings', function (Blueprint $table) {
            $table->foreignId('pelanggan_id')->constrained('pelanggans', 'id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('general_cleanings', function (Blueprint $table) {
            //
        });
    }
}
