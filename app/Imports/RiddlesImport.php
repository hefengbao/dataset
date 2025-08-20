<?php

namespace App\Imports;

use App\Models\ChineseRiddle;
use Maatwebsite\Excel\Concerns\ToModel;

class RiddlesImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new ChineseRiddle([
            'puzzle' => $row[1],
            'answer' => $row[2],
        ]);
    }
}
