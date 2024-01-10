<?php

namespace Modules\Collection\Console;

use Illuminate\Console\Command;
use Modules\Collection\Models\Subject;
use Modules\Taxon\Models\Taxon;

class UpdateTaxonNameInSubjects extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'collection:UpdateTaxonNameInSubjects';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the Taxon name in all the subjects. It will be useful when we change the name of any taxon.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        echo "\n\n UpdateTaxonNameInSubjects \n\n";

        // get all taxons
        $taxons = Taxon::all();

        $total_update_count = 0;

        // loop trhough the taxons
        foreach ($taxons as $taxon) {
            // update subjects when find a taxon_id match
            $count = Subject::where('taxon_id', $taxon->id)->update(['taxon_name' => $taxon->name]);

            // show total updated rows per taxon
            echo "\n ".$taxon->name.'| '.$count.' Subjects Updated.';

            $total_update_count += $count;
        }

        // end note, show total updated rows in total
        echo "\n\n Total {$total_update_count} subjects updated.";

        echo "\n\n";
    }
}
