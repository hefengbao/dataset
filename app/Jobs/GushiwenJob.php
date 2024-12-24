<?php

namespace App\Jobs;

use App\Guwen;
use App\Writer;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class GushiwenJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $client = new Client();
        $data = Guwen::whereNotNull('audioUrl')->whereNull('audioUrl2')->where('audioUrl', 'like', 'https://guwen%')->get();
        foreach ($data as $item) {
            $audioUrl = $item->audioUrl;
            $temp = explode('/', $audioUrl);
            $name = $temp[count($temp) - 1];
            $res = $client->get($audioUrl);
            Storage::put('audios/' . $name, $res->getBody(), 'public');
            $item->update([
                'audioUrl2' => $name
            ]);
        }

        $data = Writer::whereNotNull('avatar')->where('avatar', "!=", "")->whereNull('avatar2')->get();
        foreach ($data as $item) {
            $avatar = $item->avatar;
            $temp = explode('/', $avatar);
            $name = $temp[count($temp) - 1];
            $res = $client->get($avatar);
            Storage::put('avatars/' . $name, $res->getBody(), 'public');
            $item->update([
                'avatar2' => $name
            ]);

        }
    }
}
