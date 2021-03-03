<?php

namespace Database\Seeders;

use App\Models\Blog;
use Database\Factories\BlogsFactory;
use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* catatan nama Factory disamakan dengan nama Model */
        Blog::factory()
            ->count(100)
            ->create();
    }
}
