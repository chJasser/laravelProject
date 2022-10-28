<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'club_id',
    ];
public function courses()
{
    return $this->belongsToMany(Course::class);
}
public function club()
{
    return $this->belongsTo(Club::class);
}
}

