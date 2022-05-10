<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StakedTokensToProject extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'staked_tokens_to_projects';

    public $filterable = [
        'id',
        'project.name',
        'hedera_account',
        'dov_staked',
        'surrendered_dov',
        'number_days',
        'stake_ends_at',
    ];

    public $orderable = [
        'id',
        'project.name',
        'hedera_account',
        'dov_staked',
        'surrendered_dov',
        'is_closed',
        'number_days',
        'stake_ends_at',
    ];

    protected $casts = [
        'is_closed' => 'boolean',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'project_id',
        'hedera_account',
        'dov_staked',
        'surrendered_dov',
        'number_days',
        'stake_ends_at',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
