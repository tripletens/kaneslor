<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Admin;

use Illuminate\Support\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $new_admin = new Admin();
        $new_admin->name = "Admin" . rand(4,10);
        $new_admin->email = "admin7601335516@kaneslor.com";
        $new_admin->password = "$2y$10". "$"."rkrMrpSe8swVyinxOnOcM" .".kVwu3mtXMDLs2xsFqRuvhDpYtcQC6.6";
        $new_admin->email_verified_at = now();
        $new_admin->save();
    }
}
