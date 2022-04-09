<?php

namespace Database\Seeders;

use App\Models\SlideImage;
use Illuminate\Database\Seeder;

class SlideImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SlideImage::factory(5)->create();
    }
}
