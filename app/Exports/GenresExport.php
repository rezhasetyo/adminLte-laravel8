<?php

namespace App\Exports;

use App\Models\Genre;
use Maatwebsite\Excel\Concerns\FromCollection;

class GenresExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Genre::all();
    }
}
