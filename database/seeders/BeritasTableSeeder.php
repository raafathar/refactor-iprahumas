<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Berita;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class BeritasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        try {
            $posts = json_decode(file_get_contents(public_path('data/post.json')), true);
            foreach ($posts as $post) {
                Berita::create([
                    'user_id'   => User::where('role', 'superadmin')->first()->id,
                    'b_title'   => $post['title'],
                    'b_content' => $post['content'],
                    'b_image'   => $post['picture'],
                    'b_date'    => $post['date'],
                    'b_view'    => $post['hits'],
                    'b_is_active' => 1,
                    'b_slug'    => Str::slug($post['title']),
                ]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
