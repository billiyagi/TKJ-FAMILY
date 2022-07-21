<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker;
class PostSeeder extends Seeder
{
    public function run()
    {
        $post_model = new \App\Models\PostModel();
        $faker = Faker\Factory::create();

        for ( $i = 0; $i <= 10; $i++ )
        {
            $post_model->save([
                'category_id'   =>  1,
                'user_id'       =>  1,
                'title'         =>  $faker->text(128),
                'slug'          =>  url_title($faker->text(128)),
                'contents'      =>  $faker->paragraphs(1),
            ]);
        }

    }
}
