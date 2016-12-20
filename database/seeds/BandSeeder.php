<?php

use Illuminate\Database\Seeder;

class BandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Model\Band::class, 50)->create()->each(function(App\Model\Band $band) {
            $band->albums()->saveMany(factory(App\Model\Album::class, 10)->make());
        });
    }
}
