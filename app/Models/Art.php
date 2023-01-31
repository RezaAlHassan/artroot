<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Art extends Model
{


    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
    use HasFactory;

    protected $fillable = [
        'art_name', 'art_category', 'art_price', 'path' , 'user_id'
    ];
}
