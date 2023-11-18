<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class BlogsSeeder extends Seeder
{
    public function run()
    {
        // $data = [
        //     'gambar' => $faker->imageUrl(640, 480, 'animals', true),
        //     'judul'    => $judul = $faker->text(10),
        //     'slug'    =>  url_title($judul, '-', true),
        //     'penulis'    => $faker->name(),
        //     'text'    => $faker->paragraphs(),
        //     'created_at'    => Time::createFromTimestamp($faker->unixTime()),
        //     'updated_at'    =>  Time::now(),
        // ];
        $faker = \Faker\Factory::create("id_ID");
        for ($i = 0; $i < 2; $i++) {
            $data = [
                'judul'    => $judul = $faker->text(10),
                'gambar' => $faker->imageUrl(640, 480, $judul, true),
                'slug'    =>  url_title($judul, '-', true),
                'penulis'    => $faker->name(),
                'text'    => $faker->paragraphs(3, true),
                'created_at'    => Time::createFromTimestamp($faker->unixTime()),
                'updated_at'    =>  Time::now(),
            ];

            // Simple Queries
            // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

            // Using Query Builder
            $this->db->table('blogs')->insert($data);
        }
    }
}
