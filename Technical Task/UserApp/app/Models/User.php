<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'birthDate',
    ];

    /**
     * Accessor for Age.
     * 
     * @return int|null
     */
    public function age()
    {
        if ($this->birthDate) {
            return Carbon::parse($this->birthDate)->age;
        }
        return null;
    }
}
