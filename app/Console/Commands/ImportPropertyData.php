<?php

namespace App\Console\Commands;

use App\Models\PropertyData;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportPropertyData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:property_data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import property data from csv';

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
     * @return int
     */
    public function handle()
    {
        Excel::import(new PropertyData, 'property-data.csv', 'local', \Maatwebsite\Excel\Excel::CSV);
    }
}
