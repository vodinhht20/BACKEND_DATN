<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PhpParser\Lexer\TokenEmulator\AttributeEmulator;
use Spatie\Permission\Traits\HasRoles;


class Employee extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    protected $table = 'employees';
    protected $guarded  = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at',
        'remember_token'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatar()
    {
        if (!empty($this->avatar)) {
            if ($this->type_avatar == 1) {
                return asset('storage/' . $this->avatar);
            }
        } else {
            return asset('frontend/image/avatar_empty.jfif');
        }
        return $this->avatar;
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }

    public function timekeep()
    {
        return $this->hasMany(Timekeep::class, 'employee_id','id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }

    public function attributes()
    {
        return $this->hasMany(AttribuiteEmployee::class);
    }

    public function singleWord()
    {
        return $this->hasMany(Request::class, 'employee_id');
    }

    public function getLeader()
    {
        $position = $this->position;
        if ($position->is_leader == config('position.is_leader.yes')) {
            return $this;
        }

        $department = $position?->department;
        if ($department) {
            return Employee::whereHas('position', function ($query) use($department) {
                $query->where('department_id', $department->id);
                $query->where('is_leader', config('position.is_leader.yes'));
            })->first();
        }
        return null;
    }

    public function getStatusStr()
    {
        return config('employee.status_str.' . $this->status, "N/A");
    }
}
