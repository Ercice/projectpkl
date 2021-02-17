<?php

use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbpegawais')->insert([
            'nama_pegawai' => 'Suci Rahmawati',
            'nip' => '1234',
            'nrp' => '4848',
            'pangkat' => 'Eselon',
            'golongan' => 'serah',
            'jabatan' => 'kejati',
            'kantor' => 'kejati kalsel',
        ]);
    }
}
