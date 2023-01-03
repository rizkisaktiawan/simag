<?php

namespace App\Models\Ticketings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class TicketingPriority extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function ticketingPriorities()
    {
        return $this->hasMany(TicketingPriority::class);
    }

    public function ticketingPriority()
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
