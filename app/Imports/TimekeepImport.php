<?php

namespace App\Imports;

use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class TimekeepImport implements ToModel, WithHeadingRow
{
    public $dataImport = [];
    public $validateFile;

    public function __construct () {
        //
    }

    public function model(array $row)
    {

        if (isset($row['ma_nhan_vien'])) {
            $validator = Validator::make($row, [
                'ma_nhan_vien' => 'required',
            ], [
                'ma_nhan_vien.required' => 'Mã nhân viên đang trống',
            ]);

            if ($validator->fails()) {
                $this->validateFile = $validator->messages()->first();
                return;
            }
            $newRow = [];
            foreach ($row as $key => $rowItem) {
                if ($key == 'ma_nhan_vien') {
                    $newRow[$key] = $rowItem;
                    continue;
                }
                $keyRoot = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($key);
                $keyFormat = Carbon::instance($keyRoot)->format("Y-m-d");
                $newRow[$keyFormat] = $rowItem;
            }
            $this->dataImport[] = $newRow;
        }
    }

    public function headingRow(): int
    {
        return 3;
    }
}
