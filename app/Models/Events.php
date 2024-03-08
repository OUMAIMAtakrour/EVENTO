<?php

namespace App\Models;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Events extends Model
{
    use HasFactory;
    protected $fillable = ["id", "event_title", "description", "place", "available_seats", "category_id", "event_status", "events_access"];
    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }
}
