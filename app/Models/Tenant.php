<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Laravel\Cashier\Billable;
use Laravel\Cashier\Subscription;
use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;


class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains, Billable;

    protected $casts = [
        'trial_ends_at' => 'datetime',
    ];

    public static function getCustomColumns(): array
    {

        return [
            'id',
            'plan_id',
            'email',
            'stripe_id',
            'pm_type',
            'pm_last_four',
            'trial_ends_at',
        ];
    }

    public static function booted()
    {
        static::creating(function($tenant){

            $tenant->password = bcrypt($tenant->password);
        });
    }

    public function plan()
    {
        return $this->hasOneThrough(
            Plan::class, Subscription::class,
            'tenant_id', 'stripe_id', 'id',
            'stripe_price'

        );
    }



}
