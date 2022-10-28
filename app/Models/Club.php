<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function formations()
    {
        return $this->hasMany(Formation::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    protected $fillable = [
        'name',
        'description',
        'email',
        'category',
        'logo',
        'user_id',
    ];
    public function scopeFilter($query, array $filter)
    {
        if ($filter['search'] ?? false) {
            $query
                ->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('category', 'like' . '%', request('search') . '%');
        }
    }

}
