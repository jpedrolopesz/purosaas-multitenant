<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPlan extends Model
{
    use HasFactory;

    protected $table = 'details_plan';

    protected $fillable = ['name'];

    public function plan()
    {
       return $this->belongsTo(Plan::class);
    }
}
