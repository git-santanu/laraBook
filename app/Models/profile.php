<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'city',
        'country',
        'about',
        'user_id'
    ];
    public function profile()
    {
        return $this->hasOne(profile::class);
    }
    public $timestamps= false;
}
