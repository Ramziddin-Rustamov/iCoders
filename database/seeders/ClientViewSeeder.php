<?php

namespace Database\Seeders;

use App\Models\ClientView;
use Illuminate\Database\Seeder;

class ClientViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClientView::factory(50)->create();
    }
}
