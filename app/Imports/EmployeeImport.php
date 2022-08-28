<?php

namespace App\Imports;

use App\Repositories\EmployeeRepository;
use App\Service\EmployeeService;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;

class EmployeeImport implements ToModel, WithHeadingRow
{
    public $dataImport = [];
    public $validateFile;
    private $maxEmployeeId;

    public function __construct () {
        $employeeRepo = app(EmployeeRepository::class);
        $this->maxEmployeeId = $employeeRepo->getMaxId();
    }

    public function model(array $row)
    {
        if (isset($row['ho_va_ten'])) {
            $validator = Validator::make($row, [
                'ho_va_ten' => 'required',
                'ngay_sinh' => 'required',
                'so_dien_thoai' => 'required',
                'email_ca_nhan' => 'required',
                'gioi_tinh' => 'required',
                'ma_vi_tri' => 'required',
                'ma_chi_nhanh' => 'required',
                'dia_chi' => 'required'
            ], [
                'ho_va_ten.required' => 'Họ và tên nhân viên không được để trống',
                'ngay_sinh.required' => 'Ngày sinh không được để trống',
                'so_dien_thoai.required' => 'Số điện thoại không được để trống',
                'email_ca_nhan.required' => 'Email cá nhân không được để trống',
                'gioi_tinh.required' => 'Giới tính không được để trống',
                'ma_vi_tri.required' => 'Mã vị trí không được để trống',
                'ma_chi_nhanh.required' => 'Mã chi nhánh không được để trống',
                'dia_chi.required' => 'Địa chỉ không được để trống',
            ]);

            if ($validator->fails()) {
                $this->validateFile = $validator->messages()->first();
                return;
            }

            // formart birth day
            $birthDayRoot = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['ngay_sinh']);
            $birthDay = Carbon::instance($birthDayRoot)->format("Y-m-d");

            // format gender
            $formatGender = Str::slug($row['gioi_tinh'], '');

            // make email
            $employeeCode = "CM" . ++$this->maxEmployeeId;
            $prefix = "$employeeCode@camel.vn";
            $email = makeEmail($row['ho_va_ten'], $prefix);

            $formatRow = [
                'fullname' => $row['ho_va_ten'],
                'birth_day' => $birthDay,
                'phone' => $row['so_dien_thoai'],
                'personal_email' => $row['email_ca_nhan'],
                'gender' => config("global.gender_raw.$formatGender"),
                'position_id' => $row['ma_vi_tri'],
                'branch_id' => $row['ma_chi_nhanh'],
                'address' => $row['dia_chi'],
                'status' => config('employee.status.upcoming'),
                'is_checked' => 1,
                'employee_code' => $employeeCode,
                'email' => $email,
                'password' => bcrypt(rtrim($email, '@camel.vn')),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $this->dataImport[] = $formatRow;
        }
    }

    public function headingRow(): int
    {
        return 3;
    }
}
