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
    ];

    public $filterable = [
        'id',
        'name',
        'image',
        'price_kg',
        'verified_kg',
        'collateral_risk',
        'staked_tokens',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $hidden = [
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
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
