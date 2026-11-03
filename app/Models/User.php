<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable 
{
    use HasFactory;
    protected $table = 'users';
    protected $keyType = 'int';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'email',
        'password',
        'name'
    ];

    public function notes():HasMany
    {
        return $this->hasMany(Note::class, 'user_id', 'id');
    }
}
