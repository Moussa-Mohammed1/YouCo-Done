<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favoris extends Model
{
    use HasFactory;
    protected $table = 'favoris';
    protected $fillable =[
        'user_id',
        'restaurant_id',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
