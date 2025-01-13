<?php
/*
  ##############################################################################
  # iProduction - Production and Manufacture Management
  ##############################################################################
  # AUTHOR:		Door Soft
  ##############################################################################
  # EMAIL:		info@doorsoft.co
  ##############################################################################
  # COPYRIGHT:		RESERVED BY Door Soft
  ##############################################################################
  # WEBSITE:		https://www.doorsoft.co
  ##############################################################################
  # This is User Model
  ##############################################################################
 */

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

#use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tbl_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name',
        'designation',
        'email',
        'phone_number ',
        'password',
        'salary',
        'company_id',
        'parent_id',
        'unique_id',
        'address',
        'dob',
        'date_of_joining',
        'hourly_rate',
        'overtime_rate',
        'created_by_id',
        'available_leaves',
        'primary_sales_target',
        'secondary_sales_target',
        'shift_id',
        'team_id',
        'gender',
        'site_id',
        'salary_type',
        'base_salary',
        'dynamic_qr_device_id',
        'geofence_group_id',
        'ip_address_group_id',
        'qr_code_group_id',
        'attendance_type',
        'photo',
        'question',
        'answer',
        'type',
        'is_first_login',
        'status',
        'role',
        'del_status',
        'language',
        'last_login',
        'permission_role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     *Define relation with role
     * @return BelongsTo
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'permission_role');
    }
    public function userDevice()
    {
        return $this->hasOne(UserDevice::class, 'user_id');
    }
    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class, 'user_id');
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users', 'user_id', 'role_id');
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shift_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
    public function site()
    {
        return $this->belongsTo(Site::class, 'site_id');
    }
    public function geofenceGroup()
    {
        return $this->belongsTo(GeofenceGroup::class, 'geofence_group_id');
    }

    public function ipAddressGroup()
    {
        return $this->belongsTo(IpAddressGroup::class, 'ip_address_group_id');
    }
    
    public function tasks()
    {
        return $this->hasMany(Task::class, 'user_id');
    }

    public function geofenceVerifications()
    {
        return $this->hasMany(GeofenceVerificationLog::class, 'user_id');
    }

    public function ipAddressVerifications()
    {
        return $this->hasMany(IpAddressVerificationLog::class, 'user_id');
    }

}
