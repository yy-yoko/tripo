<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trippost extends Model
{
    use HasFactory;
    
    protected $fillable = ['content','title','image'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function favorite_users()
    {
        return $this->belongsToMany(Tripposts::class,'favorites','trippost_id','user_id');
    }

}
