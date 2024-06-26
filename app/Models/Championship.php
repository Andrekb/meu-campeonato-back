<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Championship extends Model
{
    use HasFactory;

    protected $table = 'championships';

    protected $fillable = [
        'name',
        'winner_id'
    ];

    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class, 'championship_team', 'champ_id', 'team_id')->withPivot(['champ_id', 'team_id', 'registration', 'gp', 'gc', 'points', 'position'])->withTimestamps();
    }

    public function games(): HasMany
    {
        return $this->hasMany(Game::class, 'champ_id');
    }
}
