<?php

namespace App\Console\Commands;

use App\Models\Writing;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;

class WritingCommand2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:writing2';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '知识图谱处理';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Writing::chunkById(200, function (Collection $writings) {
            $writings->each(function (Writing $writing) {
                dd(json_encode($writing->Classes, JSON_UNESCAPED_UNICODE));
                $writing->update([
                    'Classes' => $writing->Classes != null ? json_encode($writing->Classes, JSON_UNESCAPED_UNICODE) : null,
                    'Froms' => $writing->Froms != null ? json_encode($writing->Froms, JSON_UNESCAPED_UNICODE) : null,
                    'Allusions' => $writing->Allusions != null ? json_encode($writing->Allusions, JSON_UNESCAPED_UNICODE) : null,
                    'TypeDetail' => $writing->TypeDetail != null ? json_encode($writing->TypeDetail, JSON_UNESCAPED_UNICODE) : null,
                    'Title' => $writing->Title != null ? json_encode($writing->Title, JSON_UNESCAPED_UNICODE) : null,
                    'SubTitle' => $writing->SubTitle != null ? json_encode($writing->SubTitle, JSON_UNESCAPED_UNICODE) : null,
                    'Clauses' => $writing->Clauses != null ? json_encode($writing->Clauses, JSON_UNESCAPED_UNICODE) : null,
                    'Note' => $writing->Note != null ? json_encode($writing->Note, JSON_UNESCAPED_UNICODE) : null,
                    'Comments' => $writing->Comments != null ? json_encode($writing->Comments, JSON_UNESCAPED_UNICODE) : null,
                ]);

                $this->info($writing->Id);
            });
        }, 'Id');

        $this->info('结束');
    }
}
