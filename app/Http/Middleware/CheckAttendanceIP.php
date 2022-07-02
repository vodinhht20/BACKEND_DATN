<?php

namespace App\Http\Middleware;

use App\Repositories\EmployeeRepository;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

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
        $currentAdminId = JWTAuth::toUser($request->access_token);
        $ipCompanies = $this->employeeRepo->getWifiIPByEmployeeId($currentAdminId->id);
        if (in_array($request->ip(), $ipCompanies)) {
            return $next($request);
        }

        return response()->json([
            'message' => 'Check in bị từ chối. IP: ' . $request->ip(),
            'ip' => $request->ip(),
            'error_code' => 'checkin_access_denied'
        ]);
    }
}
