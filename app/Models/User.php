<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'date_of_birth',
        'phone',
        'address',
        'profissional_summary',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
            'date_of_birth'     => 'date',
        ];
    }

    /**
     * Returns the age based on the birthday
     * @return int
     */
    public function getYearOfBirthAttribute(): int
    {
        return Carbon::parse($this->attributes['date_of_birth'])->age;
    }

    /**
     * Return the correct value format to be used on the front end
     * @return string|null
     */
    public function getDateOfBirthAttribute(): ?string
    {
        if (isset($this->attributes['date_of_birth'])) {
            return Carbon::parse($this->attributes['date_of_birth'])->format('Y-m-d');
        }

        return null;
    }

    public function isAdmin(): bool
    {
        return $this->attributes['role'] === 'admin';
    }
}
