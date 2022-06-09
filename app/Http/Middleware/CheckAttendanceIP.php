<?php

namespace App\Http\Middleware;

use App\Repositories\EmployeeRepository;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAttendanceIP
{
    public function __construct(private EmployeeRepository $employeeRepo)
    {
        //
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $currentAdminId = Auth::user()->id;
        $ipCompanies = $this->employeeRepo->getWifiIPByEmployeeId($currentAdminId);
        if (in_array($request->ip(), $ipCompanies)) {
            return $next($request);
        }

        return response()->json([
            'message' => 'checkin thành công',
            'ip' => $request->ip(),
            'error_code' => 'checkin_access_denied'
        ]);
    }
}
