<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory,Notifiable;

    protected $primaryKey = 'userID'; // specify the primary key field
    public $incrementing = false; // because UUID is not auto-increment
    protected $keyType = 'string'; // because UUID is a string
    public $timestamps = false;

    protected $fillable = ['userID', 'username', 'userPassword'];

    protected $hidden = ['userPassword'];

    public function getAuthPassword()
    {
        return $this->userPassword; // specify which attribute is the password for authentication
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'userID');
    }
}
