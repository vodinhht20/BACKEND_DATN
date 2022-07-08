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
    const status = [
        'active' => 1,
        'deactive' => 2,
        'banned' => 3
    ];
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    protected $table = 'employees';
    protected $fillable = [
        'fullname',
        'password',
        'email',
        'personal_email',
        'avatar',
        'phone',
        'branch_id',
        'position_id',
        'is_checked',
        'type_avatar',
        'birth_day',
        'employee_code',
        'note',
        'gender',
    ];

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
        if ($this->type_avatar == 1) {
            return asset('storage/' . $this->avatar);
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

    // public function positions()
    // {
    //     return $this->belongsToMany(Position::class, 'employee_positions', 'employee_id', 'position_id');
    // }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }

    public function attributes()
    {
        return $this->hasMany(Attribuite_Employee::class);
    }
}
