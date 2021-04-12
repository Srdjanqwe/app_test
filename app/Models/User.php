<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Lab404\Impersonate\Models\Impersonate;


class User extends Authenticatable
{
    use HasFactory, Notifiable;
    // use Impersonate;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // public function canImpersonate()
    // {
    //     // For example
    //     return $this->is_admin == 1;
    // }
    public function blogPosts()
    {
        // return $this->hasMany(App\Models\BlogPost::class);
        return $this->hasMany('App\Models\BlogPost');

    }

    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    public function scopeThatIsAdmin(Builder $query)
    {
        return $query->where('is_admin', true);
    }
}
