<?php

namespace Database\Seeders;

use App\Models\Jobs;
use Illuminate\Database\Seeder;

class Jobseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Jobs::factory()->count(6)->create();
    }
}
