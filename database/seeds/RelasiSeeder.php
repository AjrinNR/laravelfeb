<?php

use Illuminate\Database\Seeder;
use App\Dosen;
use App\Mahasiswa;
use App\Wali;
use App\Hobi;

class RelasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //menghapus semua sample data
        DB::table('dosens')->delete();
        DB::table('mahasiswas')->delete();
        DB::table('walis')->delete();
        DB::table('hobis')->delete();
        DB::table('mahasiswa_hobi')->delete();
        // data dosen
        $dosen = Dosen::create([
            'nama' => 'Abdul Kodir',
            'nipd'=> '12390012'
        ]);
        $this->command->info('Data Dosen berhasil dibuat');
        // data mahasiswa
        $jamal = Mahasiswa::create([
            'nama'=> 'Jamal Abdullah',
            'nim' => '10231',
            'id_dosen'=>$dosen->id
        ]);

        $cecep = Mahasiswa::create([
            'nama'=> 'Cecep Soleh',
            'nim' => '10200',
            'id_dosen'=>$dosen->id
        ]);

        $kisna = Mahasiswa::create([
            'nama'=> 'Kisna Spakbor',
            'nim' => '102001',
            'id_dosen'=>$dosen->id
        ]);
        $this->command->info('Data Mahasiswa berhasil dibuat');

        // data wali
        $ahmad = Wali::create([
            'nama' => 'Ahmed Kodir',
            'id_mahasiswa' => $jamal->id
        ]);

        $idang = Wali::create([
            'nama' => 'Idang Knalpot',
            'id_mahasiswa' => $cecep->id
        ]);

        $kusni = Wali::create([
            'nama' => 'Kusni Kopling',
            'id_mahasiswa' => $kisna->id
        ]);
        $this->command->info('Data Wali berhasil dibuat');

        //membuat hobi

        $mancing = Hobi::create([
            'hobi' => 'Mancing Keributan'
        ]);
        $edit = Hobi::create([
            'hobi' => 'Edit Kehidupan'
        ]);
        $lari = Hobi::create([
            'hobi' => 'Lari dari Kenyataan'
        ]);
        $or = Hobi::create([
            'hobi' => 'Olahraga Malam'
        ]);

        // hobi ke mahasiswa

        $jamal->hobi()->attach($mancing->id);
        $jamal->hobi()->attach($lari->id);
        $cecep->hobi()->attach($or->id);
        $cecep->hobi()->attach($mancing->id);
        $kisna->hobi()->attach($edit->id);
        $this->command->info('Data Hobi Mahasiswa berhasil dibuat');
    }
}
