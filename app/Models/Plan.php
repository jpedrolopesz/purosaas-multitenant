<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;


    protected $fillable = [
        'id',
        'url',
        'slug',
        'name',
        'price',
        'tenant_id',
        'stripe_id',
        'active',
        'teams_limit',
        'recommended',
        'description',
    ];

    public function tenants()
    {
        return $this->hasOne(Tenant::class, 'tenant_id');
    }

    public function details()
    {
        return $this->hasMany(DetailPlan::class);
    }


    public function search($filter = null)
    {
        $results = $this->where('name', 'LIKE', "%{$filter}%")
            ->orWhere('description', 'LIKE', "%{$filter}%")
            ->paginate();

        return $results;
    }
}
