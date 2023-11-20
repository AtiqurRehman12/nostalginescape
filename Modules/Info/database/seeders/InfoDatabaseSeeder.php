<?php

namespace Modules\Info\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Tag\Models\Info;

class InfoDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Disable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        /*
         * Infos Seed
         * ------------------
         */

        // DB::table('infos')->truncate();
        // echo "Truncate: infos \n";

        Info::factory()->count(20)->create();
        $rows = Info::all();
        echo " Insert: infos \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
