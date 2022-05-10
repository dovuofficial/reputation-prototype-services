<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'projects';

    public $orderable = [
        'id',
        'name',
        'image',
        'price_kg',
        'verified_kg',
        'collateral_risk',
        'staked_tokens',
        'unlock_at',
        'days_remaining',
    ];

    public $filterable = [
        'id',
        'name',
        'image',
        'price_kg',
        'verified_kg',
        'collateral_risk',
        'staked_tokens',
        'unlock_at',
        'days_remaining',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'image',
        'price_kg',
        'verified_kg',
        'collateral_risk',
        'staked_tokens',
        'unlock_at',
        'days_remaining',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
