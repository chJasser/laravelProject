<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }
}
