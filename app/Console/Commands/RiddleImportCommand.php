<?php

namespace App\Console\Commands;

use App\Imports\RiddlesImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class RiddleImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:riddle-import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '导入谜语';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('开始导入');

        Excel::import(new RiddlesImport(), storage_path('app/miyu_info.csv'));

        $this->info('结束');
    }
}
