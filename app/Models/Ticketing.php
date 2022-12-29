<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticketing extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    protected $with = ['division'];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    // public function category()
    // {
    //     return $this->belongsTo(category::class);
    // }
}

class Project extends Model
{
    const STATUS_COLOR = [
        'Urgent'  => '#FFFF99',
        'Normal'   => '#90EE90',
        'Low' => '#00BFFF',
    ];
}