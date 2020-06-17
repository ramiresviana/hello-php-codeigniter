<?php

namespace App\Database\Seeds;

class DatabaseSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi semper quam et ultricies porta. Suspendisse semper pulvinar justo at maximus. Etiam a ex eu libero laoreet molestie. Nam tristique iaculis eros, vel efficitur urna lobortis in. Praesent consectetur quam quis nisi pellentesque vulputate. Aliquam vitae nibh libero. Morbi consequat ultricies enim quis tristique. Duis at odio non eros ornare volutpat et sed libero. Sed at turpis odio.',
                'image' => '1592418826_e5d9a63f8ab37fe86853.jpg'
            ],
            [
                'title' => 'Cras malesuada ligula erat, non egestas risus congue sit amet.',
                'content' => 'Cras malesuada ligula erat, non egestas risus congue sit amet. Vestibulum pretium non odio sit amet vehicula. Nunc lobortis tristique sapien, ac condimentum lorem interdum eget. Aenean imperdiet felis finibus metus aliquam euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sodales, ipsum faucibus consequat tincidunt, enim leo posuere neque, sed auctor nisi velit sit amet nisl.',
                'image' => '1592418830_4e63c858e3afd5ed138f.jpg'
            ],
            [
                'title' => 'Vivamus euismod a tellus eget interdum. Aenean ac.',
                'content' => 'Aliquam vulputate mi in vulputate aliquam. Mauris ultrices vel felis eget tempus. Morbi a est at lacus malesuada ultrices ac quis turpis. Curabitur ante metus, malesuada eget neque eu, ornare suscipit ligula. Aliquam suscipit cursus eros, ut tincidunt nulla laoreet a. Donec aliquam urna vel pellentesque sodales.',
                'image' => '1592418833_fee76be64d552363cc96.jpg'
            ]
        ];

        // Using Query Builder
        $this->db->table('article')->insertBatch($data);
    }
}
