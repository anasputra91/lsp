<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DetailPembelian;
use App\Models\DetailPenjualan;
use App\Models\Distributor;
use App\Models\Obat;
use App\Models\Pembelian;
use App\Models\Penjualan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // run user factory
            User::factory()
            ->unverified() // create user data with unverfied email
            ->gudang(3)
            ->create();

            User::factory()
            ->count(1)
            ->pemilik() // create user with role pemilik
            ->create();

            User::factory()
            ->count(3)
            ->apoteker() // create user with role apoteker
            ->create();

            User::factory()
            ->count(2)
            ->kasir() // create user with role kasir
            ->create();

            /// TODO Create random user role with value
            /// Uncoment for use
            $count = (int) 4;
            User::factory()
            ->count($count)
            ->create();
        // end run user factory


        // run obat factory
            Obat::factory()
            ->count(7)
            ->create();
        // end run obat factor

        // run distributor factory
            Distributor::factory()
            ->count(6)
            ->create();
        // end run distributor facotry

        // run penjualan factory
            Penjualan::factory()
            ->count(3)
            ->create();
        // end run penjualan factory

        // run pembelian factory
            Pembelian::factory()
            ->count(3)
            ->create();
        // end run penjualan factory

        // run DetailPenjualan factory
            DetailPenjualan::factory()
            ->count(3)
            ->create();
        // end run DetailPenjualan factory

        // run DetailPembelian factory
            DetailPembelian::factory()
            ->count(3)
            ->create();
        // end run DetailPembelian factory

    }
}
