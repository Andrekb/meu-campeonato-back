<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Team extends Model
{
    use HasFactory;

    protected $table = 'teams';

    protected $fillable = [
        'name',
        'path',
        'wins'
    ];

    public function championships(): HasMany 
    {
        return $this->belongsToMany(Championship::class, 'championship_team', 'team_id', 'champ_id');
    }
}
