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
            CREATE TRIGGER total_pembelian_delete 
            AFTER DELETE
            ON `detail_pembelian` FOR EACH ROW
            BEGIN
                UPDATE `pembelian`
                SET total_beli = (SELECT SUM(jumlah_beli) FROM `detail_pembelian` WHERE id_pembelian = OLD.id_pembelian)
                WHERE id = OLD.id_pembelian;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        DB::unprepared('DROP TRIGGER `total_pembelian_delete`');
    }
};
