<?php

namespace App\Console\Commands;

use App\Imports\DictImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class WordDictionary2Command extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:word-dic2';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('开始导入');

        Excel::import(new DictImport(), storage_path('app/zidian.xlsx'));

        $this->info('结束');

        return Command::SUCCESS;
    }
}
