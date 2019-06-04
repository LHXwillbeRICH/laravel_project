<?php

use Illuminate\Database\Seeder;

class PlatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Admin\Models\Plat::class,20)->create();
    }
}
