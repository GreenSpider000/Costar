<?php

namespace Modules\Collection\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Collection\Models\Subject;
use Modules\Taxon\Models\Taxon;
use Modules\Tag\Models\Tag;

class CollectionDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Auth::loginUsingId(1);

        // Disable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        /*
         * Taxon Seed
         * ------------------
         */
        DB::table('taxons')->truncate();
        echo "\nTruncate: taxons \n";

        Taxon::factory()->count(5)->create();
        echo " Insert: taxons \n\n";

        /*
         * Subjects Seed
         * ------------------
         */
        DB::table('subjects')->truncate();
        echo "Truncate: subjects \n";

        // Populate the pivot table
        Subject::factory()
            ->has(Tag::factory()->count(rand(1, 5)))
            ->count(25)
            ->create();
        echo " Insert: subjects \n\n";

        // Artisan::call('auth:permission', [
        //     'name' => 'subjects',
        // ]);
        // Artisan::call('auth:permission', [
        //     'name' => 'taxons',
        // ]);
        // Artisan::call('auth:permission', [
        //     'name' => 'tags',
        // ]);

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
