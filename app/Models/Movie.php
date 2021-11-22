<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $user_id
 * @property string $movie_id
 * @property string $title
 * @property int    $year
 * @property bool   $seen
 * @method static Builder withUserId(int $cid)
 */
class Movie extends Model
{
    use HasFactory;

    public $fillable = [
        'movie_id',
        'user_id',
        'title',
        'year',
        'seen',
    ];

    protected $casts = [
        'seen' => 'boolean',
    ];

    public function scopeWithUserId(Builder $query, int $userId)
    {
        return $query->where('user_id', $userId);
    }
}
