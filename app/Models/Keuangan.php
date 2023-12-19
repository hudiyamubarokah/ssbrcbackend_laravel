<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\keuangan as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;



class Keuangan extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'keuangan';

    protected $fillable = [
        'description',
        'saldo',
        'type',
        'tgl_transaksi',
    ];

}
