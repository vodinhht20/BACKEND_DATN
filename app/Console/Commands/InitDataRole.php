<?php

namespace App\Console\Commands;

use App\Models\Employee;
use App\Models\ModelHasPermission;
use App\Models\ModelHasRole;
use App\Models\RoleHasPermission;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class InitDataRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'init:role';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comand init role';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info("---- Start ----");
        DB::beginTransaction();
        try {
            $this->info("---- Clear Data Exist ----");
            Schema::disableForeignKeyConstraints();
            RoleHasPermission::truncate();
            ModelHasRole::truncate();
            ModelHasPermission::truncate();
            Role::truncate();
            Permission::truncate();
            Schema::enableForeignKeyConstraints();

            $this->info("---- Start Init ----");
            Permission::create(['name' => 'dashboard']);
            Permission::create(['name' => 'timesheet']);
            Permission::create(['name' => 'request']);
            Permission::create(['name' => 'news']);
            Permission::create(['name' => 'setting_checkin']);
            Permission::create(['name' => 'setting_calendar']);
            Permission::create(['name' => 'setting_employee']);
            Permission::create(['name' => 'setting_global']);

            /** @var Role $humanResourceRole */
            $humanResourceRole = Role::create(['name' => 'human_resource']);
            $humanResourceRole->givePermissionTo([
                "dashboard", "timesheet", "request",
                "setting_checkin", "setting_calendar", "setting_employee",
                "news"
            ]);

            /** @var Role $leaderRole */
            $leaderRole = Role::create(['name' => 'leader']);
            $leaderRole->givePermissionTo(["dashboard", "request"]);

            /** @var Role $adminRole */
            $adminRole = Role::create(['name' => 'admin']);

            /** @var Role $memberRole */
            $memberRole = Role::create(['name' => 'member']);

            Employee::find(1)->assignRole($adminRole);
            return $this->info("---- Done ----");
            DB::commit();
        } catch (\Exception $e) {
            $message = '[' . date('Y-m-d H:i:s') . '] Error message \'' . $e->getMessage() . '\'' . ' in ' . $e->getFile() . ' line ' . $e->getLine();
            Log::error($message);
            DB::rollBack();
            return $this->error("---- Data Init Falied ----");
        }
    }
}
