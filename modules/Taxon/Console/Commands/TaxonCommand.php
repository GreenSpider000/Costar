<?php

namespace Modules\Taxon\Console\Commands;

use Illuminate\Console\Command;

class TaxonCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:TaxonCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Taxon Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return Command::SUCCESS;
    }
}
