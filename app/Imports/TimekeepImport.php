<?php

namespace App\Imports;

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
                'ngay_*' => 'required'

            ], [
                'ma_nhan_vien.required' => 'Mã nhân viên đang trống',
                'ngay_*.required' => 'Số công bị thiếu'
            ]);

            if ($validator->fails()) {
                $this->validateFile = $validator->messages()->first();
                return;
            }
            $this->dataImport[] = $row;
        }
    }

    public function headingRow(): int
    {
        return 3;
    }
}
