<?php

namespace App\Console\Commands;

use App\Imports\UserDataImport;
use App\Models\Period;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:exceluser {file : The path to the Excel file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import user data from an Excel file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filePath = $this->argument('file');
        $active_period = Period::where('status', 'active')->first();

        if (!file_exists($filePath)) {
            $this->error("File not found at: $filePath");
            return Command::FAILURE;
        }

        if (!$active_period) {
            $this->error("Periode pendaftaran telah berakhir");
            return Command::FAILURE;
        }

        try {
            Excel::import(new UserDataImport, $filePath);
            $this->info("Data successfully imported from $filePath");
        } catch (\Exception $e) {
            $this->error("An error occurred: " . $e->getMessage());
        }

        return Command::SUCCESS;
    }
}