<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Division extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function divisions()
    {
        return $this->hasMany(Division::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
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

