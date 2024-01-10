<?php

namespace Modules\Taxon\Database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxonDatabaseSeeder extends Seeder
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
         * taxons Seed
         * ------------------
         */

        // DB::table('taxons')->truncate();
        // echo "Truncate: taxons \n";

        Taxon::factory()->count(20)->create();
        $rows = Taxon::all();
        echo " Insert: taxons \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
