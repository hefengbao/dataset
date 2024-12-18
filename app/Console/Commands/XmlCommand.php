<?php

namespace App\Console\Commands;

use DOMDocument;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\IOFactory;
use Saloon\XmlWrangler\Exceptions\XmlReaderException;
use Saloon\XmlWrangler\XmlReader;

class XmlCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:xml';

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
        //$file = file(Storage::path('document.xml'));
        //$this->info($file[0]);

        //$phpWord = \PhpOffice\PhpWord\IOFactory::load(Storage::path('5.docx'));

        try {
            /*$doc = new DOMDocument();
            $doc->load(storage_path('app/document2.xml'));

            $body=$doc->getElementsByTagName("body");

            foreach ($body as $item){
                $this->info(json_encode($item));
            }*/

           /* $xml = new DOMDocument();
            $xml->encoding = mb_detect_encoding(storage_path('app/document2.xml'));
            $xml->preserveWhiteSpace = false;
            $xml->formatOutput = true;
            $xml->loadXML(storage_path('app/document2.xml'));
            $xml->saveXML();

            foreach ($xml as $item)
            {
                $this->info($item);
            }*/

            $reader = XmlReader::fromFile(storage_path('app/document2.xml'));

            try {
                $level = 1;
                foreach ($reader->elements() as $element) {
                    //$this->info(json_encode($element, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE));
                    $level = $this->f($element, $level);
                }
                $this->info('level = ' . $level);
            } catch (\Throwable $e) {
                $this->error($e->getTraceAsString());
            }

        } catch (XmlReaderException $e) {
            $this->error($e->getTraceAsString());
        }
    }

    private function f($arr, $level)
    {
        if (is_array($arr)){
            foreach ($arr as $item){
                $level ++;
                $this->f($item, $level);

            }
        }else{
            $this->info(json_encode($arr));
        }

       return $level;
    }
}
