<?php

namespace App\Models;

use App\Jobs\SyncStripeCustomerDetails;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'logo',
        'is_admin'
    ];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function booted()
    {
        static::updating(function (self $user) {
            Tenant::where('email', $user->getOriginal('email'))
                ->update($user->only(['email']));
        });

        static::updated(function ($user) {
            if ($user->hasStripeId()) {
                SyncStripeCustomerDetails::dispatch($user);
            }
        });
    }



    public function sendEmailVerificationNotification()
    {

        $this->notify(new VerifyEmail);
    }

}
