<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $age;
    protected $is_today_birthday;

    protected $appends = ['age'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthday'          => 'datetime:d.m.y',
        'created_at'        => 'datetime:d.m.y H:i:s',
        'updated_at'        => 'datetime:d.m.y H:i:s',
    ];

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

    public function getAgeAttribute(){
        $birthday = date('Y', strtotime($this->birthday));
        $today = date('Y');
        return $today - $birthday;
    }

    public function getIsTodayBirthdayAttribute(){
        $birthday = date('d.m', strtotime($this->birthday));
        return $birthday == date('d.m');
    }
}
