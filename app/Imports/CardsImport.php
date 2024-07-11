<?php

namespace App\Imports;

use App\Models\Card;
use Maatwebsite\Excel\Concerns\ToModel;

class CardsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Card([
            'title' => $row[1],
            'short_description' => $row[2],
            'description' => $row[3],
            'imageRoute' => $row[4],
            'category' => $row[5],
            'user_id' => $row[6],
        ]);
    }
}
