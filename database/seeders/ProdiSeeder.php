<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama_prodi'    =>  'Teknik Mesin'],
            ['nama_prodi'    =>  'Manajemen Bisnis Pariwisata'],
            ['nama_prodi'    =>  'Teknik Sipil'],
            ['nama_prodi'    =>  'Agribisnis'],
            ['nama_prodi'    =>  'Teknik Informatika'],
            ['nama_prodi'    =>  'Teknologi Pengolahan Hasil Ternak']
        ];
        Prodi::insert($data);
    }
}
