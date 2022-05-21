<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consignment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
