<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeeImport implements ToCollection, WithHeadingRow
{
    public $dataImport = [];
    public $validateFile;

    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        ($collection);
    }

    public function headingRow(): int
    {
        return 3;
    }
}
