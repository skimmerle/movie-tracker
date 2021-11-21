<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $userId
 * @property string $movieId
 * @property string $title
 * @property int    $year
 * @property bool   $seen
 * @method static Builder withUserId(int $cid)
 */
class Movie extends Model
{
    use HasFactory;

    public $fillable = [
        'movieId',
        'userId',
        'title',
        'year',
        'seen',
    ];

    protected $casts = [
        'seen' => 'boolean',
    ];

    public function scopeWithUserId(Builder $query, int $userId)
    {
        return $query->where('userId', $userId);
    }
}
