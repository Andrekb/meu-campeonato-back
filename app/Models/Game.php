<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Game extends Model
{
    use HasFactory;

    protected $table = 'games';

    protected $fillable = [
        'home_id',
        'away_id',
        'champ_id',
        'winner_id',
        'home_goals',
        'away_goals',
        'match_type'
    ];

    public function championship(): BelongsTo
    {
        return $this->belongsTo(Championship::class, 'champ_id');
    }
}
