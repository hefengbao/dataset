<?php

namespace App\Imports;

use App\Models\Dictionary;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use function Psl\Str\Byte\words;
use function Psl\Type\nullable;

class DictImport implements ToModel
{

    public function model(array $row)
    {
        return new Dictionary([
            'id' => $row[0],
            'char' => $row[1],
            'wubi' => $row[2],
            'radical' => $row[3],
            'stroke' => $row[4],
            'pinyin' => $row[6],
            'pinyin2' => $this->pinyin2($row[6]),
            'simple_explanation' => $row[7],
            'explanation' => $row[8],
            'loanword' => $this->loanword($row[6])
        ]);
    }

    private function pinyin2($pinyin): null|array
    {
        if ($pinyin == null){
            return null;
        }

        if (Str::contains($pinyin,',')){
            return collect(explode(',', $pinyin))->map(function ($value){
                return $this->replace(Str::slug(\Psl\Str\trim($value)));
            })->all();
        }else{
            return [$this->replace($pinyin)];
        }
    }

    private function replace($a): string
    {
        if (Str::contains($a,'ā')){
            return Str::replace('ā','a',$a);
        }elseif(Str::contains($a,'á')){
            return Str::replace('á','a',$a);
        }elseif(Str::contains($a,'ǎ')){
            return Str::replace('ǎ','a',$a);
        }elseif(Str::contains($a,'à')){
            return Str::replace('à','a',$a);
        }elseif(Str::contains($a,'ō')){
            return Str::replace('ō','o',$a);
        }elseif(Str::contains($a,'ó')){
            return Str::replace('ó','o',$a);
        }elseif(Str::contains($a,'ǒ')){
            return Str::replace('ǒ','o',$a);
        }elseif(Str::contains($a,'ò')){
            return Str::replace('ò','o',$a);
        }elseif(Str::contains($a,'ē')){
            return Str::replace('ē','e',$a);
        }elseif(Str::contains($a,'é')){
            return Str::replace('é','e',$a);
        }elseif(Str::contains($a,'ě')){
            return Str::replace('ě','e',$a);
        }elseif(Str::contains($a,'è')){
            return Str::replace('è','e',$a);
        }elseif(Str::contains($a,'ī')){
            return Str::replace('ī','i',$a);
        }elseif(Str::contains($a,'í')){
            return Str::replace('í','i',$a);
        }elseif(Str::contains($a,'ǐ')){
            return Str::replace('ǐ','i',$a);
        }elseif(Str::contains($a,'ì')){
            return Str::replace('ì','i',$a);
        }elseif(Str::contains($a,'ū')){
            return Str::replace('ū','u',$a);
        }elseif(Str::contains($a,'ú')){
            return Str::replace('ú','u',$a);
        }elseif(Str::contains($a,'ǔ')){
            return Str::replace('ǔ','u',$a);
        }elseif(Str::contains($a,'ù')){
            return Str::replace('ù','u',$a);
        }elseif(Str::contains($a,'ǖ')){
            return Str::replace('ǖ','ü',$a);
        }elseif(Str::contains($a,'ǘ')){
            return Str::replace('ǘ','ü',$a);
        }elseif(Str::contains($a,'ǚ')){
            return Str::replace('ǚ','ü',$a);
        }elseif(Str::contains($a,'ǜ')){
            return Str::replace('ǜ','ü',$a);
        } else{
            return $a;
        }
    }

    private function loanword($pinyin): bool
    {
        if ($pinyin == null){
            return false;
        }

        if (Str::contains($pinyin,' ') && !Str::contains($pinyin,',')){
            return true;
        }else{
            return false;
        }
    }
}
