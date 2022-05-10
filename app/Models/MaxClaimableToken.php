<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaxClaimableToken extends Model
{
    use HasFactory;
    use HasAdvancedFilter;

    public $table = 'max_claimable_tokens';

    public $orderable = [
        'id',
        'max_tokens',
    ];

    public $filterable = [
        'id',
        'max_tokens',
    ];

    protected $fillable = [
        'max_tokens',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
