<?php

namespace App\Database\Seeds;

class DatabaseSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Vivamus euismod a tellus eget interdum. Aenean ac.',
                'content' => 'Aliquam vulputate mi in vulputate aliquam. Mauris ultrices vel felis eget tempus. Morbi a est at lacus malesuada ultrices ac quis turpis. Curabitur ante metus, malesuada eget neque eu, ornare suscipit ligula. Aliquam suscipit cursus eros, ut tincidunt nulla laoreet a. Donec aliquam urna vel pellentesque sodales.',
                'image' => 'img.jpg'
            ],
            [
                'title' => 'Vivamus euismod a tellus eget interdum. Aenean ac.',
                'content' => 'Aliquam vulputate mi in vulputate aliquam. Mauris ultrices vel felis eget tempus. Morbi a est at lacus malesuada ultrices ac quis turpis. Curabitur ante metus, malesuada eget neque eu, ornare suscipit ligula. Aliquam suscipit cursus eros, ut tincidunt nulla laoreet a. Donec aliquam urna vel pellentesque sodales.',
                'image' => 'img.jpg'
            ],
            [
                'title' => 'Vivamus euismod a tellus eget interdum. Aenean ac.',
                'content' => 'Aliquam vulputate mi in vulputate aliquam. Mauris ultrices vel felis eget tempus. Morbi a est at lacus malesuada ultrices ac quis turpis. Curabitur ante metus, malesuada eget neque eu, ornare suscipit ligula. Aliquam suscipit cursus eros, ut tincidunt nulla laoreet a. Donec aliquam urna vel pellentesque sodales.',
                'image' => 'img.jpg'
            ]
        ];

        // Using Query Builder
        $this->db->table('article')->insertBatch($data);
    }
}
