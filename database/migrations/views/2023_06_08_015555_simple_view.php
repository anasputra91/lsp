<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        DB::statement('
        CREATE VIEW simple_view
        AS 
        SELECT
            a.tgl_kadarluarsa,
            sum(sub_total_beli)
        FROM
            detail_pembelian as a
        GROUP BY
            a.tgl_kadarluarsa
        ;

        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        DB::statement('DROP VIEW simple_view');
    }
};
