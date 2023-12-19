<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'name', 'email', 'password', 'token','photo'
    ];

    // public function skill()
    // {
    //     return $this->belongsToMany(SubTalent::class, 'relasi', 'id_user');
    // }



}
