<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'isBanned',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function clients(){
        return $this->hasMany(Reservation::class, 'client_id');
    }
}
