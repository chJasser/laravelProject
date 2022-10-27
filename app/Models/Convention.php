<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Convention extends Model
{
    use HasFactory;

   // protected $fillable  = ['name','description', 'adress','picture','start_date','end_date'];
   public function scopeFilter($query, array $filter)
   {
      
       if ($filter['search'] ?? false) {
           $query
               ->where('name', 'like', '%' . request('search') . '%')
               ->orWhere('description', 'like' . '%', request('search') . '%')
               ->orWhere('owner', 'like', '%' . request('search') . '%');
       }
   }
    public $timestamps = false;

    public function reclamation()
	{
		return $this->hasMany(Reclamation::class);
	}
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
