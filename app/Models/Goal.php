<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    protected $fillable = [
        'namegoals', 'description', 'user_id',
    ];

    protected $casts = [
        'mealsids' => 'json'
    ];

    public function meals()
    {
        return $this->hasMany(Meal::class);
    }
    public function users()
    {
        return $this->hasOne(User::class);
    }
}
