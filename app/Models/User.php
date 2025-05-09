<?php

namespace App\Models;

//// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

define('SET_NULL','SET_NULL');
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'phone',
        'password',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            //// 'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function kabupaten()
    {
        return $this->belongsToMany(UserKabupatenModel::class);
    }

    /**
     * The opd that belong to the user.
     */
    public function opd()
    {
        return $this->belongsToMany(UserOpdModel::class, 'user_opd');
    }

    /**
     * The unit that belong to the user.
     */
    public function unit()
    {
        return $this->belongsToMany(UserUnitModel::class, 'user_unit');
    }
}
