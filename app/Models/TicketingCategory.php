<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class TicketingCategory extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function TicketingCategories()
    {
        return $this->hasMany(TicketingCategory::class);
    }

    public function TicketingCategory()
    {
        return $this->belongsTo(TicketingCategory::class);
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
