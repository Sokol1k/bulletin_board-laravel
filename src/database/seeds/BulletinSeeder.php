<?php

use Illuminate\Database\Seeder;

class BulletinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for ($i = 0; $i < 100; $i++) {
        factory(App\Models\Bulletin::class, 100)->create();
        // }
    }
}
