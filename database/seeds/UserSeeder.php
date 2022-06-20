<?php

use App\Siswa;
use App\Kriteria;
use App\Role;
use App\Topsis;
use App\TopsisInisial;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        * @array created Users
        */
        // Create Users Login ------------------------------------------------------------------------------------------------------------
        $users = [
            // Users 1
            ['name' => 'administrasi', 'email' => 'admin@mail.com', 'password' => bcrypt('password'), 'role_id' => 1,],

            // Users 2
            ['name' => 'Human Resource Development', 'email' => 'hrd@mail.com', 'password' => bcrypt('password'), 'role_id' => 2,],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }


        /*
        * @array created Role
        */
        // Created Role ------------------------------------------------------------------------------------------------------------------
        $roles = [
            // Role 1
            ['name' => 'administrasi',],

            // Role 2
            ['name' => 'hrd',],
        ];

        foreach ($roles as $key => $role) {
            Role::create($role);
        }


        /*
        * @array created Siswas
        */
        // Created Siswas --------------------------------------------------------------------------------------------------------------
        $siswas = [
            // Siswa I
            [
                'photos' => null,
                'nama' => 'Januar Rizky',
                'jenis_kelamin' => '1',
                'tempat_lahir' => 'Depok',
                'tanggal_lahir' => '2008-10-29',
                'alamat' => 'Jalan Pondok Benda',
                'agama' => '1',
                'kelas' => '2',
                'no_tlp_siswa' => '08xx-xxxx-xxx',
                'nama_ayah' => 'Zakaria',
                'pekerjaan_ayah' => 'Pegawai Swasta',
                'nama_ibu' => 'Fatimah',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
                'no_tlp_ortu' => '08xx-xxxx-xxx',
                'nama_wali' => 'Wani',
                'pekerjaan_wali' => 'Lainnya',
                'no_tlp_wali' => '08xx-xxxx-xxx',
            ],

            // Siswa I
            [
                'photos' => null,
                'nama' => 'Dama Yusuf',
                'jenis_kelamin' => '1',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2009-10-11',
                'alamat' => 'Jalan Villa Jatiras',
                'agama' => '1',
                'kelas' => '2',
                'no_tlp_siswa' => '08xx-xxxx-xxx',
                'nama_ayah' => 'Abdullah',
                'pekerjaan_ayah' => 'Lainnya',
                'nama_ibu' => 'Dina',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
                'no_tlp_ortu' => '08xx-xxxx-xxx',
                'nama_wali' => 'Tina',
                'pekerjaan_wali' => 'Lainnya',
                'no_tlp_wali' => '08xx-xxxx-xxx',
            ],

            // Siswa I
            [
                'photos' => null,
                'nama' => 'M Sakti',
                'jenis_kelamin' => '1',
                'tempat_lahir' => 'Bekasi',
                'tanggal_lahir' => '2008-02-29',
                'alamat' => 'Jalan Villa Nusa Indah',
                'agama' => '1',
                'kelas' => '2',
                'no_tlp_siswa' => '08xx-xxxx-xxx',
                'nama_ayah' => 'Beni',
                'pekerjaan_ayah' => 'Dagang',
                'nama_ibu' => 'Siti',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
                'no_tlp_ortu' => '08xx-xxxx-xxx',
                'nama_wali' => 'Ferren',
                'pekerjaan_wali' => 'Lainnya',
                'no_tlp_wali' => '08xx-xxxx-xxx',
            ],

            // Siswa I
            [
                'photos' => null,
                'nama' => 'Hanifah',
                'jenis_kelamin' => '2',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2008-06-27',
                'alamat' => 'Jalan Kemerdekaan',
                'agama' => '1',
                'kelas' => '2',
                'no_tlp_siswa' => '08xx-xxxx-xxx',
                'nama_ayah' => 'Wahyudi',
                'pekerjaan_ayah' => 'Lainnya',
                'nama_ibu' => 'Rara',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
                'no_tlp_ortu' => '08xx-xxxx-xxx',
                'nama_wali' => 'Tika',
                'pekerjaan_wali' => 'Lainnya',
                'no_tlp_wali' => '08xx-xxxx-xxx',
            ],

            // Siswa I
            [
                'photos' => null,
                'nama' => 'Keisya A',
                'jenis_kelamin' => '2',
                'tempat_lahir' => 'Bekasi',
                'tanggal_lahir' => '2008-08-09',
                'alamat' => 'Jalan Kemerdekaan',
                'agama' => '1',
                'kelas' => '2',
                'no_tlp_siswa' => '08xx-xxxx-xxx',
                'nama_ayah' => 'Budi',
                'pekerjaan_ayah' => 'Lainnya',
                'nama_ibu' => 'Fatimah',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
                'no_tlp_ortu' => '08xx-xxxx-xxx',
                'nama_wali' => 'Dina',
                'pekerjaan_wali' => 'Lainnya',
                'no_tlp_wali' => '08xx-xxxx-xxx',
            ],

            // // Siswa I
            // [
            //     'photos' => null,
            //     //     'nama' => 'Abdullah',
            //     'jenis_kelamin' => '1',
            //     'tempat_lahir' => 'Jakarta',
            //     'tanggal_lahir' => '2015-10-29',
            //     'alamat' => 'Jalan Kemerdekaan',
            //     'agama' => '1',
            //             'kelas' => '2',
            //     'no_tlp_siswa' => '08xx-xxxx-xxx',
            //     'nama_ayah' => 'Abdul bin Fullan',
            //     'pekerjaan_ayah' => 'Pegawai Swasta',
            //     'nama_ibu' => 'Fatimah bin Fullan',
            //     'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            //     'no_tlp_ortu' => '08xx-xxxx-xxx',
            //     'nama_wali' => 'Wali Murid',
            //     'pekerjaan_wali' => 'Pengusaha',
            //     'no_tlp_wali' => '08xx-xxxx-xxx',
            // ],

            // // Siswa I
            // [
            //     'photos' => null,
            //     //     'nama' => 'Abdullah',
            //     'jenis_kelamin' => '1',
            //     'tempat_lahir' => 'Jakarta',
            //     'tanggal_lahir' => '2015-10-29',
            //     'alamat' => 'Jalan Kemerdekaan',
            //     'agama' => '1',
            //             'kelas' => '2',
            //     'no_tlp_siswa' => '08xx-xxxx-xxx',
            //     'nama_ayah' => 'Abdul bin Fullan',
            //     'pekerjaan_ayah' => 'Pegawai Swasta',
            //     'nama_ibu' => 'Fatimah bin Fullan',
            //     'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            //     'no_tlp_ortu' => '08xx-xxxx-xxx',
            //     'nama_wali' => 'Wali Murid',
            //     'pekerjaan_wali' => 'Pengusaha',
            //     'no_tlp_wali' => '08xx-xxxx-xxx',
            // ],

            // // Siswa I
            // [
            //     'photos' => null,
            //     //     'nama' => 'Abdullah',
            //     'jenis_kelamin' => '1',
            //     'tempat_lahir' => 'Jakarta',
            //     'tanggal_lahir' => '2015-10-29',
            //     'alamat' => 'Jalan Kemerdekaan',
            //     'agama' => '1',
            //             'kelas' => '2',
            //     'no_tlp_siswa' => '08xx-xxxx-xxx',
            //     'nama_ayah' => 'Abdul bin Fullan',
            //     'pekerjaan_ayah' => 'Pegawai Swasta',
            //     'nama_ibu' => 'Fatimah bin Fullan',
            //     'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            //     'no_tlp_ortu' => '08xx-xxxx-xxx',
            //     'nama_wali' => 'Wali Murid',
            //     'pekerjaan_wali' => 'Pengusaha',
            //     'no_tlp_wali' => '08xx-xxxx-xxx',
            // ],

            // // Siswa I
            // [
            //     'photos' => null,
            //     //     'nama' => 'Abdullah',
            //     'jenis_kelamin' => '1',
            //     'tempat_lahir' => 'Jakarta',
            //     'tanggal_lahir' => '2015-10-29',
            //     'alamat' => 'Jalan Kemerdekaan',
            //     'agama' => '1',
            //             'kelas' => '2',
            //     'no_tlp_siswa' => '08xx-xxxx-xxx',
            //     'nama_ayah' => 'Abdul bin Fullan',
            //     'pekerjaan_ayah' => 'Pegawai Swasta',
            //     'nama_ibu' => 'Fatimah bin Fullan',
            //     'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            //     'no_tlp_ortu' => '08xx-xxxx-xxx',
            //     'nama_wali' => 'Wali Murid',
            //     'pekerjaan_wali' => 'Pengusaha',
            //     'no_tlp_wali' => '08xx-xxxx-xxx',
            // ],

            // // Siswa I
            // [
            //     'photos' => null,
            //     //     'nama' => 'Abdullah',
            //     'jenis_kelamin' => '1',
            //     'tempat_lahir' => 'Jakarta',
            //     'tanggal_lahir' => '2015-10-29',
            //     'alamat' => 'Jalan Kemerdekaan',
            //     'agama' => '1',
            //  => '2',  =s'
            //
            //     'no_tlp_siswa' => '08xx-xxxx-xxx',
            //     'nama_ayah' => 'Abdul bin Fullan',
            //     'pekerjaan_ayah' => 'Pegawai Swasta',
            //     'nama_ibu' => 'Fatimah bin Fullan',
            //     'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            //     'no_tlp_ortu' => '08xx-xxxx-xxx',
            //     'nama_wali' => 'Wali Murid',
            //     'pekerjaan_wali' => 'Pengusaha',
            //     'no_tlp_wali' => '08xx-xxxx-xxx',
            // ],
        ];

        foreach ($siswas as $key => $siswa) {
            Siswa::create($siswa);
        }

        /*
        * @array created Kriteria
        */
        // Created Kriteria ------------------------------------------------------------------------------------------------------------
        $kriterias = [
            // Kriteria 1
            ['name' => 'Kehadiran', 'weight' => '15',],

            // Kriteria 2
            ['name' => 'Tanggungan Orang Tua', 'weight' => '20',],

            // Kriteria 3
            ['name' => 'Hafalan Al-Quran', 'weight' => '25',],

            // Kriteria 4
            ['name' => 'Prestasi', 'weight' => '35',],
        ];

        foreach ($kriterias as $key => $kriteria) {
            Kriteria::create($kriteria);
        }

        /*
        * @array created Penilaian
        */
        // Created Penilaian -----------------------------------------------------------------------------------------------------------
        $penilaians = [
            // Siswa 1
            ['siswa_id' => 1, 'kriteria_id' => 1, 'nilai_awal' => 88, 'inisialisasi' => 5,],
            ['siswa_id' => 1, 'kriteria_id' => 2, 'nilai_awal' => 2, 'inisialisasi' => 2,],
            ['siswa_id' => 1, 'kriteria_id' => 3, 'nilai_awal' => 'Juz 30', 'inisialisasi' => 1,],
            ['siswa_id' => 1, 'kriteria_id' => 4, 'nilai_awal' => 'Rank 3', 'inisialisasi' => 1,],

            // Siswa 2
            ['siswa_id' => 2, 'kriteria_id' => 1, 'nilai_awal' => 70, 'inisialisasi' => 4,],
            ['siswa_id' => 2, 'kriteria_id' => 2, 'nilai_awal' => 4, 'inisialisasi' => 4,],
            ['siswa_id' => 2, 'kriteria_id' => 3, 'nilai_awal' => 'Juz 29', 'inisialisasi' => 2,],
            ['siswa_id' => 2, 'kriteria_id' => 4, 'nilai_awal' => 'Rank 2', 'inisialisasi' => 2,],

            // Siswa 3
            ['siswa_id' => 3, 'kriteria_id' => 1, 'nilai_awal' => 82, 'inisialisasi' => 5,],
            ['siswa_id' => 3, 'kriteria_id' => 2, 'nilai_awal' => 3, 'inisialisasi' => 3,],
            ['siswa_id' => 3, 'kriteria_id' => 3, 'nilai_awal' => 'Juz 28', 'inisialisasi' => 3,],
            ['siswa_id' => 3, 'kriteria_id' => 4, 'nilai_awal' => 'Porda', 'inisialisasi' => 4,],

            // Siswa 4
            ['siswa_id' => 4, 'kriteria_id' => 1, 'nilai_awal' => 83, 'inisialisasi' => 5,],
            ['siswa_id' => 4, 'kriteria_id' => 2, 'nilai_awal' => 1, 'inisialisasi' => 1,],
            ['siswa_id' => 4, 'kriteria_id' => 3, 'nilai_awal' => 'Juz 30', 'inisialisasi' => 1,],
            ['siswa_id' => 4, 'kriteria_id' => 4, 'nilai_awal' => 'Rank 1', 'inisialisasi' => 3,],

            // Siswa 5
            ['siswa_id' => 5, 'kriteria_id' => 1, 'nilai_awal' => 69, 'inisialisasi' => 3,],
            ['siswa_id' => 5, 'kriteria_id' => 2, 'nilai_awal' => 4, 'inisialisasi' => 4,],
            ['siswa_id' => 5, 'kriteria_id' => 3, 'nilai_awal' => 'Juz 1', 'inisialisasi' => 4,],
            ['siswa_id' => 5, 'kriteria_id' => 4, 'nilai_awal' => 'Ponas', 'inisialisasi' => 5,],

            // // Siswa 6
            // ['siswa_id' => 6, 'kriteria_id' => 1, 'nilai_awal' => 18.66, 'inisialisasi' => 3,],
            // ['siswa_id' => 6, 'kriteria_id' => 2, 'nilai_awal' => 3.66, 'inisialisasi' => 1,],
            // ['siswa_id' => 6, 'kriteria_id' => 3, 'nilai_awal' => 16.99, 'inisialisasi' => 2,],
            // ['siswa_id' => 6, 'kriteria_id' => 4, 'nilai_awal' => 9.36, 'inisialisasi' => 2,],

            // // Siswa 7
            // ['siswa_id' => 7, 'kriteria_id' => 1, 'nilai_awal' => 8.81, 'inisialisasi' => 2,],
            // ['siswa_id' => 7, 'kriteria_id' => 2, 'nilai_awal' => 22.72, 'inisialisasi' => 3,],
            // ['siswa_id' => 7, 'kriteria_id' => 3, 'nilai_awal' => 29.48, 'inisialisasi' => 3,],
            // ['siswa_id' => 7, 'kriteria_id' => 4, 'nilai_awal' => 5.89, 'inisialisasi' => 1,],

            // // Siswa 8
            // ['siswa_id' => 8, 'kriteria_id' => 1, 'nilai_awal' => 4.69, 'inisialisasi' => 1,],
            // ['siswa_id' => 8, 'kriteria_id' => 2, 'nilai_awal' => 14.92, 'inisialisasi' => 2,],
            // ['siswa_id' => 8, 'kriteria_id' => 3, 'nilai_awal' => 26.59, 'inisialisasi' => 3,],
            // ['siswa_id' => 8, 'kriteria_id' => 4, 'nilai_awal' => 15.39, 'inisialisasi' => 3,],

            // // Siswa 9
            // ['siswa_id' => 9, 'kriteria_id' => 1, 'nilai_awal' => 17.41, 'inisialisasi' => 3,],
            // ['siswa_id' => 9, 'kriteria_id' => 2, 'nilai_awal' => 6.62, 'inisialisasi' => 1,],
            // ['siswa_id' => 9, 'kriteria_id' => 3, 'nilai_awal' => 22.87, 'inisialisasi' => 3,],
            // ['siswa_id' => 9, 'kriteria_id' => 4, 'nilai_awal' => 10.39, 'inisialisasi' => 2,],

            // // Siswa 1
            // ['siswa_id' => 10, 'kriteria_id' => 1, 'nilai_awal' => 19.29, 'inisialisasi' => 3,],
            // ['siswa_id' => 10, 'kriteria_id' => 2, 'nilai_awal' => 5.99, 'inisialisasi' => 1,],
            // ['siswa_id' => 10, 'kriteria_id' => 3, 'nilai_awal' => 27.11, 'inisialisasi' => 3,],
            // ['siswa_id' => 10, 'kriteria_id' => 4, 'nilai_awal' => 12.84, 'inisialisasi' => 2,],

        ];

        foreach ($penilaians as $key => $penilaian) {
            TopsisInisial::create($penilaian);
        }
    }
}
