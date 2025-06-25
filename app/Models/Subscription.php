<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id' ,'name', 'phone', 'plan', 'meal_types', 'delivery_days', 'allergies', 'total_price', 'status', 'pause_start', 'pause_end'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isActive()
    {
        return $this->status === 'active';
    }

    public function isPaused()
    {
        return $this->status === 'paused';
    }

    public function isCancelled()
    {
        return $this->status === 'cancelled';
    }
}
