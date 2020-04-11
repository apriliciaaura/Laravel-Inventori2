<?php

use Illuminate\Database\Seeder;
use App\Ruangan;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listRuangan = ['Ruangan 1', 'Ruangan 2', 'Ruangan 3'];
        $jurusan = 1;

        foreach($listRuangan as $ruangan){
        	Ruangan::create(['jurusan_id' => $jurusan++,'nama_ruangan' => $ruangan]);
        }
    }
}
