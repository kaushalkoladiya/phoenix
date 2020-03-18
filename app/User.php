<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;


class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, SoftDeletes;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();  // TODO: change the autogenerated stub

        static::created(function (\app\User $user) {
            $user->profile()->create([
                'name' => $user->username
            ]);
            
            //Stripe customer
            $user->createAsStripeCustomer();

            // Send welcome Email from here
            $user->notify(new \App\Notifications\WelcomeNotification($user));;
        });

        
    }

    public function profile() {
        return $this->hasOne(Profile::class);
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function song() {
        return $this->hasManyThrough('App\Song', 'App\Album');
    }

    public function album() {
        return $this->hasMany(Album::class)->orderBy('created_at', 'DESC');
    }

    public function playlist() {
        return $this->hasMany(Playlist::class)->orderBy('created_at', 'DESC');
    }

    public function following() {
        return $this->belongsToMany(Profile::class)->withTimestamps();
    }

}
