<?php

namespace App\Console\Commands;

use App\Imports\DictImport;
use App\Imports\RiddlesImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use PDO;

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
