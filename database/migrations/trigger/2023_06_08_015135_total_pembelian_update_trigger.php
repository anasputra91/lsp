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
        DB::unprepared('
            CREATE TRIGGER total_pembelian_update 
            AFTER UPDATE
            ON `detail_pembelian` FOR EACH ROW
            BEGIN
                IF NEW.jumlah_beli IS NOT NULL THEN
                    UPDATE `pembelian`
                    SET total_beli = (SELECT SUM(jumlah_beli) FROM `detail_pembelian` WHERE id_pembelian = NEW.id_pembelian)
                    WHERE id = NEW.id_pembelian;
                END IF;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        DB::unprepared('DROP TRIGGER `total_pembelian_update`');
    }
};
