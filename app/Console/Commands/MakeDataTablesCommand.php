<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeDataTablesCommand extends Command
{
    protected $signature = 'datatables:make {model}';

    protected $description = 'Generate DataTables for a model';

    public function handle()
    {
        $modelName = $this->argument('model');

        // Your logic to generate DataTables for the specified model
        $this->info("Generating DataTables for {$modelName}...");
    }
}
