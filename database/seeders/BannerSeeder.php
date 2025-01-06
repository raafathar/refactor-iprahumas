<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('banners')->delete();

        \DB::table('banners')->insert(array(
            0 =>
            array(
                'b_title' => 'Psikologi Berwarna',
                'b_image' => "berita/berita2.png",
                'b_is_active' => 1,
                'created_at' => '2024-12-26 04:13:42',
                'updated_at' => '2024-12-26 04:13:42',
            ),
            1 =>
            array(
                'b_title' => 'Urban Farming',
                'b_image' => "berita/berita2.png",
                'b_is_active' => 1,
                'created_at' => '2024-12-26 04:10:35',
                'updated_at' => '2024-12-26 04:10:35',
            ),
        ));
    }
}
