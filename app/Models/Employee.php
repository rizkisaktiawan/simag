<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['division', 'status'];

    protected $casts = [
        'date_join' => 'datetime:m-d-Y',
        'date_birth' => 'datetime:m-d-Y',
    ];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'name');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('D, Y-m-d H:i:s');
    }
}
