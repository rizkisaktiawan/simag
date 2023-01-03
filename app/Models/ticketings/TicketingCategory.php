<?php

namespace App\Models\Ticketings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class TicketingCategory extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $table = 'ticketings_categories';
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
