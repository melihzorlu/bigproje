<?php
// app/Models/User.php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'tc_no', 'birth_date', 'phone', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
