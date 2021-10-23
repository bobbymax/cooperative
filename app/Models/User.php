<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;
use Laravel\Passport\HasApiTokens;

/**
 *
 * @OA\Schema(
 * @OA\Xml(name="User"),
 * @OA\Property(property="id", type="integer", example="75"),
 * @OA\Property(property="staff_no", type="string", example="15AA"),
 * @OA\Property(property="grade_level_id", type="integer", example="25"),
 * @OA\Property(property="department_id", type="integer", example="505"),
 * @OA\Property(property="company_id", type="integer", example="505"),
 * @OA\Property(property="firstname", type="string", example="John"),
 * @OA\Property(property="middlename", type="string", example="Okolo"),
 * @OA\Property(property="surname", type="string", example="Doe"),
 * @OA\Property(property="email", type="string", example= "jdoe@email.com") ,
 * @OA\Property(property="mobile", type="string", example="+2348127820880"),
 * @OA\Property(property="designation", type="string", example="Cleaner"),
 * @OA\Property(property="location", type="string", example="Abuja"),
 * @OA\Property(property="duration", type="integer", example="4"),
 * @OA\Property(property="email_verified_at", type="date-time", example="2020-10-20"),
 * @OA\Property(property="password", type="string", example="8979874hnwe__"),
 * @OA\Property(property="type", type="string", enum={"permanent", "contract", "secondment", "vendor"} , example="vendor"),
 * @OA\Property(property="date_of_birth", type="date", example="2020-10-20"),
 * @OA\Property(property="date_joined", type="date", example="2020-12-22"),
 * @OA\Property(property="address", type="string", example= "Sambisa Forest"),
 * @OA\Property(property="status", type="string", enum={"in-service", "retired", "removed", "transfer-of-service"} , example="in-service"),
 * @OA\Property(property="remember_token", type="string", example= "YSysysYGSoioeOISHe") ,
 * @OA\Property(property="created_at", type="date", example="2020-10-20"),
 * @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 * Class User
 *
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
    protected $guarded = [''];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function gradeLevel()
    {
        return $this->belongsTo(GradeLevel::class, 'grade_level_id');
    }

    public function roles()
    {
        return $this->morphedByMany(Role::class, 'userable');
    }

    public function groups()
    {
        return $this->morphedByMany(Group::class, 'userable');
    }

    public function actAs(Role $role)
    {
        return $this->roles()->save($role);
    }

    public function addTo(Group $group)
    {
        return $this->groups()->save($group);
    }

    public function accounts()
    {
        return $this->morphMany(Account::class, 'accountable');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function batches()
    {
        return $this->hasMany(Batch::class);
    }

    public function journals()
    {
        return $this->hasMany(Journal::class);
    }
}
