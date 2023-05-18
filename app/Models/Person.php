<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
