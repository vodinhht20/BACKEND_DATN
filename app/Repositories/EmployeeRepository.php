<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;

class EmployeeRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\Employee::class;
    }

    public function getWifiIPByEmployeeId($employeeId)
    {
        $employee = $this->model
            ->with(['branch', 'branch.network'])
            ->find($employeeId);
        if ($employee) {
            $networks = $employee->branch->network->pluck('wifi_ip');
            return $networks->toArray();
        }

        return response()->json([
            'message' => 'Checkin thất bại vui lòng kết nối Wifi công ty để điểm danh',
            'ip' => $request->ip(),
            'error_code' => 73
        ]);
    }
}
