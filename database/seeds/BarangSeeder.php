<?php

use Illuminate\Database\Seeder;
use App\Barang

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listBarang = ['Proyektor', 'Remote', 'Laptop'];
        $ruangan = 1;

        foreach($listBarang as $barang){
        	Barang::create(['ruangan_id' => $ruangan++,'nama_barang' => $barang]);
        }
    }
}
