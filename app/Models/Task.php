<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $primaryKey = 'taskID';
    public $incrementing = false;
    protected $keyType = 'string'; 
    public $timestamps = true;

    protected $fillable = [
        'taskID',
        'title',
        'created_at',
        'updated_at',
        'userID'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }
}
