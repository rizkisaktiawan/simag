<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class TicketingPriority extends Model
{
    use HasFactory,Sluggable;

    protected $guarded = ['id'];

    public function TicketingPriorities()
    {
        return $this->hasMany(TicketingPriority::class);
    }

    public function TicketingPriority()
    {
        return $this->belongsTo(TicketingPriority::class);
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
